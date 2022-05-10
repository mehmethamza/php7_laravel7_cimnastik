
<div id="map-container" class="fullwidth-home-map">

    <div id="map" data-map-scroll="false">
       <script>

       </script>
    </div>

	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="main-search-input">
						<div class="main-search-input-item location">
							<div id="autocomplete-container" data-autocomplete-tip="type and hit enter">
								<input id="autocomplete-input" type="text"  placeholder="Location"  v-model="search" @change="getWorkplaces()">

							</div>
							<a href="#"><i class="fa fa-map-marker"></i></a>
						</div>

						<div class="main-search-input-item">

							<select  class="form-select" v-model="selectedProduct" data-placeholder="All Categories" @change="getWorkplaces()">
                                <option   value="">Tüm Kategorilerdeki Salonlar</option>
                                @foreach ($products as $product)
                                    <option value="{{encrypt($product->id) }}">{{$product->name}} Destekleyen Salonlar</option>
                                @endforeach
							</select>
						</div>

						<button class="button">Search</button>

					</div>
				</div>
			</div>
		</div>

	</div>

</div>
