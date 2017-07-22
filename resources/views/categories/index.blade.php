@extends('layouts.main')

@section('content')
    <a href="{{ route('categories.create') }}" class="md-btn md-btn-large md-btn-primary md-btn-wave waves-effect waves-button uk-width-2-10 uk-push-8-10">Add new category</a>
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-nowrap uk-table-striped">
                    <thead>
                    <tr>
                        <th class="uk-width-3-10 uk-text-center">Name</th>
                        <th class="uk-width-2-10 uk-text-center">Department</th>
                        <th class="uk-width-1-10 uk-text-center">Top Level</th>
                        <th class="uk-width-1-10 uk-text-center">Retention Period</th>
                        <th class="uk-width-3-10 uk-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="uk-text-center">{{ $category->name }}</td>
                            <td class="uk-text-center">{{ $category->departments }}</td>
                            <td class="uk-text-center">{!! $category->root !!}</td>
                            <td class="uk-text-center">{!! $category->retention_period !!}</td>
                            <td class="uk-text-center">
                                <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
@stop