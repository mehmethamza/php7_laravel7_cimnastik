<div id="listing-pricing-list" class="listing-section">
    <h3 class="listing-desc-headline margin-top-70 margin-bottom-30">Pricing</h3>

        <div class="pricing-list-container">

            <!-- Food List -->
            <h4>Eğitimler ve Ücretleri</h4>
            <ul>
                @foreach ($workplace -> workplaceProducts as $workplaceProduct)
                <li>
                    <h5> {{$workplaceProduct -> product -> name}}</h5>
                    <span>
                        @if ($workplace->status == "payed")
                            {{$workplaceProduct -> price}}TL
                        @else
                            Belirlenmedi
                        @endif

                    </span>
                </li>
                @endforeach
            </ul>

        </div>

</div>
