@extends('layouts.app')

@section('mainTitle', 'Services')

@section('content')
    <?php
        $currentEntityPermissions = \Request::get('permissionDetails')['currentEntityPermissions'];
    ?>
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Service List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a id="createServiceButton" href="#" class="p-0 createResourceBtn ladda-button" title="Create Service"  data-module="service" data-url="services/create" data-style="zoom-in">
                                                Create
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="view-borderless-table">
                        <div class="row">
                            <div class="col s12">
                                <table>
                                    <?php
                                        $theadList = [
                                            'Name', 'Provider Name', 'Mobile No.', 'Category'
                                        ];
                                    ?>
                                    <thead>
                                        <tr>
                                            @foreach($theadList as $thead)
                                                <th>{{ $thead }}</th>
                                            @endforeach
                                            @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($serviceList->count() > 0)
                                            @foreach($serviceList as $service)
                                                <tr>
                                                    <td>{{ $service->name }}</td>
                                                    <td>{{ $service->provider_name }}</td>
                                                    <td>{{ $service->mobile_no }}</td>
                                                    <td>{{ $service->category }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <button type="button" rel="tooltip" class="btn btn-small indigo accent-3 editServiceButton editResourceBtn ladda-button" data-tooltip="Edit Service" data-module="service" data-id="{{ $service->id }}" data-url="services/{{ $service->id }}/edit" data-style="zoom-in">
                                                                <i class="fa fa-edit mr-0"></i>
                                                            </button>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="{{ collect($theadList)->count()+1 }}" class="center-align">{{ config('custom.noResultFoundString') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="createEditServiceModalContainer"></div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/services.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this Service?';
        });
    </script>
@endsection
