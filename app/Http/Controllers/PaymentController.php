<?php

namespace App\Http\Controllers;

use App\Models\Workplaces;
use Illuminate\Http\Request;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

function getPaymentForm($seller,$workplace)
{
    $options = new Options();
    $options->setApiKey('sandbox-7nSYCFxJW7Ws2DNHWEjDDlmVBdGsZwtQ');
    $options->setSecretKey('V0aZiQtBgzW5thy9RRRZ22xkQA1Bc4Ma');
    $options->setBaseUrl('https://sandbox-api.iyzipay.com');
    $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setPrice("50");
    $request->setPaidPrice("50");
    $request->setCurrency(\Iyzipay\Model\Currency::TL);
    $request->setBasketId("324324");
    $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    $request->setCallbackUrl("".route('receive',encrypt($workplace->id))."");
    $request->setEnabledInstallments(array(2, 3, 6, 9));

    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId("BY789");
    $buyer->setName("".$seller->name."");
    $buyer->setSurname("".$seller->name."");
    $buyer->setGsmNumber("".$seller->userDetails->phone."");
    $buyer->setEmail("".$seller->email."");
    $buyer->setIdentityNumber("0000000000");
    $buyer->setLastLoginDate("2015-10-05 12:43:35");
    $buyer->setRegistrationDate("2013-04-21 15:12:09");
    $buyer->setRegistrationAddress("".$workplace->full_adress."");
    $buyer->setIp("85.34.78.112");
    $buyer->setCity("".$workplace->province."");
    $buyer->setCountry("".$workplace->country."");
    $buyer->setZipCode("".$workplace->zip."");
    $request->setBuyer($buyer);

    $request->setBuyer($buyer);
    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName("".$seller->name."");
    $shippingAddress->setCity("".$workplace->province."");
    $shippingAddress->setCountry("Turkey");
    $shippingAddress->setAddress("".$workplace->full_adress."");
    $shippingAddress->setZipCode("".$workplace->zip."");
    $request->setShippingAddress($shippingAddress);

    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName("".$seller->name."");
    $billingAddress->setCity("".$workplace->province."");
    $billingAddress->setCountry("Turkey");
    $billingAddress->setAddress("".$workplace->full_adress."");
    $billingAddress->setZipCode("".$workplace->zip."");
    $request->setBillingAddress($billingAddress);

    $basketItems = array();
    $firstBasketItem = new \Iyzipay\Model\BasketItem();
    $firstBasketItem->setId("BI101");
    $firstBasketItem->setName("Binocular");
    $firstBasketItem->setCategory1("Collectibles");
    $firstBasketItem->setCategory2("Accessories");
    $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    $firstBasketItem->setPrice("50");
    $basketItems[0] = $firstBasketItem;



    $request->setBasketItems($basketItems);

    $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
    $paymentForm = $checkoutFormInitialize->getCheckoutFormContent();
    return $paymentForm;
}


class PaymentController extends Controller
{
    public function createPaymentForm(Request $request)
    {
        $workplace = Workplaces::find(decrypt($request->workplace_id));
        $seller = $workplace -> workplaceSeller;
        $paymentForm = getPaymentForm($seller,$workplace);
        return view("dashboard.workplace_payment.index",compact("workplace","seller","paymentForm"));
    }
    public function receivePaymentForm(Request $request,$workplace_id)
    {
        $options = new Options();
        $options->setApiKey('sandbox-7nSYCFxJW7Ws2DNHWEjDDlmVBdGsZwtQ');
        $options->setSecretKey('V0aZiQtBgzW5thy9RRRZ22xkQA1Bc4Ma');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');
        # create request class
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken($_POST['token']);
        # make request
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request,$options);
        // print_r($checkoutForm->getPaymentItems()[0] -> getItemId());
        # print result
        // return $checkoutForm -> getPaymentId(); buda iyziconun oluşturduğu ödeme id si
        // return $checkoutForm -> getBasketId();  B67832 şeklinde döndü dewfault templatede
        if ($checkoutForm -> getStatus() == "success") {
            $workplace_id = decrypt($workplace_id);
            $workplace = Workplaces::find($workplace_id);
            $workplace -> status = "payed";
            $workplace->save();
            $workplace -> details -> payment_code = $checkoutForm -> getPaymentId();
            $workplace -> details -> payment_date = now();
            $workplace -> details -> payment_total = $checkoutForm->getPrice();
            $workplace -> details -> save();

            auth()->login($workplace->workplaceSeller);
            return redirect()->route("dashboard.listing.workplace")
            ->with("alert","".$workplace->title.""." iş yeriniz için ödeme başarıyla gerçekleştirildi")
            ->with("alert_type","success");

        }
    }
}
