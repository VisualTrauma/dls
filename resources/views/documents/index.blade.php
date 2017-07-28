@extends('layouts.main')

@section('page-title-heading') Shows all existing documents in the system @stop
@section('page-description') Search and view documents here @stop

@section('content')
    <div class="gallery_grid uk-grid-width-medium-1-4 uk-grid-width-large-1-5" data-uk-grid="{gutter: 16}">
	    <div>
	        <div class="md-card md-card-hover">
	            <div class="gallery_grid_item md-card-content">
	                <a href="{{ url('assets/img/gallery/Image01.jpg') }}" data-uk-lightbox="{group:'gallery'}">
	                    <img src="{{ url('assets/img/gallery/Image01.jpg') }}" alt="">
	                </a>
	                <div class="gallery_grid_image_caption">
	                    <div class="gallery_grid_image_menu" data-uk-dropdown="{pos:'top-right'}">
	                        <i class="md-icon material-icons">&#xE5D4;</i>
	                        <div class="uk-dropdown uk-dropdown-small">
	                            <ul class="uk-nav">
	                                <li><a href="#"><i class="material-icons uk-margin-small-right">&#xE150;</i> Edit</a></li>
	                                <li><a href="#"><i class="material-icons uk-margin-small-right">&#xE872;</i> Remove</a></li>
	                            </ul>
	                        </div>
	                    </div>
	                    <span class="gallery_image_title uk-text-truncate">Dolorum enim optio voluptates.</span>
	                    <span class="uk-text-muted uk-text-small">29 Jun 2016, 40KB</span>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	{{ $documents->links('vendor.pagination.default') }}						
@stop