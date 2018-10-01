@extends('core::admin.master')

@section('title', __('Contacts'))

@section('content')

<div ng-cloak ng-controller="ListController">

    @include('core::admin._button-create', ['module' => 'contacts'])

    <h1>@lang('Contacts')</h1>

    <div class="btn-toolbar">
        @include('core::admin._button-select')
        @include('core::admin._button-actions')
        @include('core::admin._lang-switcher-for-list')
    </div>

    <div class="table-responsive">

        <table st-persist="contactsTable" st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="status_translated" class="status st-sort">{{ __('Status') }}</th>
                    <th st-sort="image" class="image st-sort">{{ __('Image') }}</th>
                    <th st-sort="title_translated" class="title_translated st-sort">{{ __('Email') }}</th>
                    <th st-sort="title_translated" class="title_translated st-sort">{{ __('Name') }}</th>
                    <th st-sort="title_translated" class="title_translated st-sort">{{ __('Message') }}</th>
                </tr>
                <tr>
                    <td colspan="12">
                        <input st-search="title_translated" class="form-control form-control-sm" placeholder="@lang('Filter')…" type="text">
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td>
                        <input type="checkbox" checklist-model="checked.models" checklist-value="model">
                    </td>
                    <td>
                        @include('core::admin._button-edit', ['module' => 'contacts'])
                    </td>
                    <td typi-btn-status action="toggleStatus(model)" model="model"></td>
                    <td>
                        <img ng-src="@{{ model.thumb }}" alt="">
                    </td>
                    <td>@{{ model.name }}</td>
                    <td>@{{ model.email }}</td>
                    <td>@{{ model.message }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" typi-pagination></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>

@endsection
