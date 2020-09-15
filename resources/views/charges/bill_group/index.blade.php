@extends('layouts.app')

@section('mainTitle', 'Bill Group')

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
                                <h4 class="card-title">Bill Group List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a id="createBillGroupButton" class="p-0 createResourceBtn ladda-button" href="#" data-module="chargeBillGroup" data-url="charges/bill_group/create" data-style="zoom-in">
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
                                        'Name'
                                    ];
                                    ?>
                                    <thead>
                                    <tr>
                                        @foreach($theadList as $thead)
                                            <th>{{ $thead }}</th>
                                        @endforeach

                                        @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                            <th class="right">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($billGroupList->count() > 0)
                                        @foreach($billGroupList as $billGroup)
                                            <tr id="{{ $billGroup->id }}">
                                                <td>{{ $billGroup->name }}</td>
                                                <td>
                                                    <ul class="collection with-header">
                                                        @foreach($billGroup->particulars as $particular)
                                                            <li class="collection-item">
                                                                <div>
                                                                    {{ $particular->name }}
                                                                    <span class="secondary-content">{{ $particular->amount }}</span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                    <td>
                                                        <button class="btn blue btn-small right editResourceBtn editBillGroupBtn ladda-button" rel="tooltip" data-original-title="Edit Bill Group" data-module="chargeBillGroup" data-id="{{ $billGroup->id }}" data-url="charges/bill_group/{{ $billGroup->id }}/edit" data-style="zoom-in">
                                                            <i class="fa fa-edit m0"></i>
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

    <div id="createEditChargeBillGroupModalContainer"></div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/ChargeBillGroup.js') }}"></script>
@endsection
