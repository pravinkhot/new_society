@extends('layouts.app')

@section('mainTitle', 'Wings & Blocks')

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
                                <h4 class="card-title">Wings & Blocks List</h4>
                            </div>

                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a id="createWingButton" class="p-0 createResourceBtn ladda-button" href="#" data-module="wing" data-url="wings/create" data-style="zoom-in">
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
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($wingList->count() > 0)
                                        @foreach($wingList as $wing)
                                            <tr id="{{ $wing->id }}">
                                                <td>{{ $wing->name }}</td>

                                                    <td>
                                                        @if(isset($currentEntityPermissions['edit']) && 1 === $currentEntityPermissions['edit'])
                                                            <button class="btn btn-small indigo accent-3 editResourceBtn editWingBtn ladda-button tooltip" data-tooltip="Edit Wing" data-module="wing" data-id="{{ $wing->id }}" data-url="wings/{{ $wing->id }}/edit" data-style="zoom-in">
                                                                <i class="fa fa-edit m0"></i>
                                                            </button>
                                                        @endif
                                                    </td>
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

    <div id="createEditWingModalContainer"></div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/wings.js') }}"></script>
@endsection
