@extends('layouts.main')

@section('page-title-heading') Create a category @stop
@section('page-description') Add a new category to the system @stop

@section('content')
    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    @foreach($errors->all() as $error)
                        {{ $error }} <br/>
                    @endforeach
                </div>
                <form class="uk-width-medium-1-3" action="{{ route('categories.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <label>CATEGORY NAME</label>
                            <input type="text" class="md-input" name="name" value="{{ old('name') }}"/>
                        </div>
                        <div class="uk-form-row">
                            <label>ATTRIBUTES</label>
                            <textarea class="md-input" row="3" name="raw_attributes">{{ old('raw_attributes') }}</textarea>
                            <span class="help-block uk-text-warning">use lowercase letters in declaring attributes and separate them by comma. i.e.
                                <span class="uk-text-bold">employee name, employee id</span>.</span>
                        </div>
                        <div class="uk-form-row">
                            <select id="selec_adv_1" name="departments[]" multiple>
                                <option value="">DEPARTMENTS</option>
                                <option value="ACNT">Accounting</option>
                                <option value="HR">Human Resource</option>
                                <option value="IT">Information Technology</option>
                                <option value="IA">Internal Audit</option>
                                <option value="TRNG">Training</option>
                                <option value="RND">Research and Development</option>
                                <option value="QMR">Quality Management Representative</option>
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <select name="retention_period" data-md-selectize>
                                <option value="">RETENTION PERIOD</option>
                                <option value="0">INDEFINITE</option>
                                <option value="3">3 years</option>
                                <option value="5">5 years</option>
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <input class="uk-hidden" name="category" value="{{ old('category') }}">
                             <span class="icheck-inline">
                                            <input type="radio" name="category_type" id="root" data-md-icheck checked/>
                                            <label id="label-root" for="root" class="inline-label">Top Level Category</label>
                                        </span>
                            <span class="icheck-inline">
                                            <input type="radio" name="category_type" id="subcategory" data-md-icheck />
                                            <label id="label-subcategory" for="subcategory" class="inline-label">Subcategory</label>
                                        </span>
                        </div>
                        <div class="uk-form-row" id="parent-div">
                            <select name="parent_id" data-md-selectize>
                                <option value="">PARENT</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <button class="md-btn md-btn-primary md-btn-large md-btn-block md-btn-wave-light waves-effect waves-button waves-light">Add category</button>
                        </div>
                    </div>
                </form>
                <div class="uk-width-medium-1-3" id="sample">
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <!-- page specific plugins -->
    <!-- ionrangeslider -->
    <script src="{{ url('bower_components/ion.rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="{{ url('assets/js/uikit_htmleditor_custom.min.js') }}"></script>
    <!-- inputmask-->
    <script src="{{ url('bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
    <!--  forms advanced functions -->
    <script src="{{ url('assets/js/pages/forms_advanced.js') }}"></script>

    <script>
        parent_div = $('div[id="parent-div"]')

        $('label[for="root"]').on('click', function() {
            if(parent_div.hasClass('uk-hidden')) {
                $('input[name="category"]').val('root')
            } else {
                parent_div.addClass('uk-hidden')
                $('input[name="category"]').val('root')
            }
        })

        $('label[for="root"]').trigger('click')

        $('label[for="subcategory"]').on('click', function() {
            if(parent_div.hasClass('uk-hidden')) {
                parent_div.removeClass('uk-hidden')
                $('input[name="category"]').val('subcategory')
            } else {
                $('input[name="category"]').val('subcategory')
            }
        })
    </script>

    <script src="{{ url('js/old_input.js') }}"
            data-departments='{!! json_encode(old('departments')) !!}'
            data-retention-period="{{ old('retention_period') }}"
            data-parent-id="{{ old('parent_id') }}"
            data-category="{{ old('category') }}">
    </script>
@stop