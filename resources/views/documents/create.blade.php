@extends('layouts.main')

@section('page-title-heading') Create new document @stop
@section('page-description') Add new document in the system @stop

@section('page-specific-css')
    <!-- dropify -->
    <link rel="stylesheet" href="{{ url('assets/skins/dropify/css/dropify.css') }}">
@stop

@section('content')
<div class="md-card">
    <div class="md-card-content">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-3">
                @foreach($errors->all() as $error)
                    {{ $error }} <br/>
                @endforeach
            </div>
            <div class=uk-width-medium-1-3>
            	<!-- START UPLOAD FORM -->
				<form action="{{ url('documents') }}" method="POST" enctype="multipart/form-data" id="upload-form"> {{ csrf_field() }}
				    <!-- START FILE INPUT -->
				    <div class="uk-width-medium-1">
				        <span class="uk-form-help-block md-color-red-A700 uk-text-bold">{{ $errors->first('document') }}</span>
				        <input type="file" class="dropify" name="document"/><br>
				    </div>
				    <!-- END FILE INPUT -->

				    <!-- START SELECT CATEGORIES -->
				    <div class="uk-width-medium-1">
				        <select class="md-input" name="category_id" style="height: 40px; color: #888888; cursor: pointer" v-model="category_id" @change="changeCategory(category_id)">
				            <option class="uk-hidden" value="">CATEGORY</option>
							<option v-for="category in categories" :value="category.id">@{{ category.name }}</option>
				        </select>
				        <span class="uk-form-help-block"></span>
				    </div>
				    <!-- END SELECT CATEGORIES -->

					<!-- START ATTRIBUTES -->
					<div class="uk-width-medium-1" v-for="attribute in selectedCategoryAttributes" v-if="categoryIsChanged">
						<input class="md-input" :name="attribute.modified_name" :placeholder="attribute.raw_name.toUpperCase()">
					</div>
					<!-- END ATTRIBUTES -->

				    <!-- START DATEPICKER -->
				    <div class="uk-width-medium-1">
				        <input class="md-input" placeholder="DATE DOCUMENT HAS BEEN CREATED" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="document_created_at">
				    </div>
				    <!-- END DATEPICKER -->

				    <!-- START SELECT BRANCHES -->
				    <div class="uk-width-medium-1">
				        <select class="md-input" name="branch" data-md-selectize>
				            <option value="">BRANCH</option>
				            <optgroup label="NEWSIM branches">
				                <option>Bacolod</option>
				                <option>Cebu</option>
				                <option>Davao</option>
				                <option>Iloilo</option>
				                <option>Makati</option>
				            </optgroup>
				        </select>
				        <span class="uk-form-help-block"></span>
				    </div>
				    <!-- END SELECT BRANCHES -->

				    <br/>
				    <!-- START UPLOAD BUTTON -->
				    <div class="uk-width-medium">
				        <button class="md-btn md-btn-primary md-btn-block md-btn-wave-light" id="upload_btn">Upload Document</button>
				    </div>
				    <!-- END UPLOAD BUTTON -->
				</form>
				<!-- END UPLOAD FORM -->
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <!--  dropify -->
    <script src="{{ url('assets/js/custom/dropify/dist/js/dropify.js') }}"></script>

    <!--  form file input functions -->
    <script src="{{ url('assets/js/pages/forms_file_input.min.js') }}"></script>

    <!-- clipboardjs messages -->
    <script src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>
    <script> var clipboard = new Clipboard('#copy_btn'); console.log(clipboard); </script>

    <script>
    	new Vue({
			el: '#upload-form',
			data: {
			    categoryIsChanged: false,
				selectedCategoryAttributes: [],
				category_id: '',
				categories: [],
				attributes: []
			},
			created() {
			    let self = this
			    axios.get("{{ url('api/categories') }}")
				.then(response => {
				    self.categories = response.data
				})

                axios.get("{{ url('api/attributes') }}")
                    .then(response => {
                        self.attributes = response.data
                    })
			},
			methods: {
				changeCategory(category_id) {
				    let self = this
				    this.attributes.forEach(element => {
				        if(category_id == element.category_id) {
				            self.selectedCategoryAttributes.push(element)
						}
					})
					this.categoryIsChanged = true
				}
			}
		})
    </script>
@stop