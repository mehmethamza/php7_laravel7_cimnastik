<div class="add-listing-section margin-top-45">

    <!-- Headline -->
    <div class="add-listing-headline">
        <h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
        <!-- Switcher -->
        <label class="switch"><input type="checkbox" style="visibility: hidden" checked></label>
    </div>

    <!-- Switcher ON-OFF Content -->
    <div class="switcher-content">

        <div class="row">
            <div class="col-md-12">
                <table id="pricing-list-container">
                    @foreach ($workplace->workplaceProducts as $wproduct)
                    <tr class="pricing-list-item pattern">
                            <td>
                                <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                <div class="fm-input pricing-name">
                                    <select name="products[]" class="form-select"  id="">
                                        <option value="{{encrypt($wproduct->product ->id) }}" selected>{{$wproduct->product->name}}</option>
                                        @foreach ($products as $product)
                                        <option value="{{encrypt($product -> id) }}">{{$product -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fm-input pricing-price">
                                    <input type="text" name="products_price[]" placeholder="Price" value="{{(int)$wproduct->price}}" data-unit="TL" />
                                </div>
                                <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                            </td>

                    </tr>
                    @endforeach
                </table>
                <a href="#" class="button add-pricing-list-item">Add Item</a>

            </div>
        </div>

    </div>
    <!-- Switcher ON-OFF Content / End -->

</div>
