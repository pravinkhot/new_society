@extends('layouts.app')

@section('mainTitle', 'Flats')

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
                                <h4 class="card-title">Flat List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a class="p-0" href="{{ route('flats.create') }}" target="_self">
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
                                            'Flat No', 'Wing', 'Owner Name', 'Owner Mobile No.', 'Intercom', 'Area', 'Status'
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
                                        @if($flatList->count() > 0)
                                            @foreach($flatList as $flat)
                                                <tr id="{{ $flat->id }}">
                                                    <td>{{ $flat->flat_no }}</td>
                                                    <td>{{ $flat->getFlatWing->name }}</td>
                                                    <td>{{ $flat->owner_full_name }}</td>
                                                    <td>{{ $flat->owner_number }}</td>
                                                    <td>{{ $flat->intercom }}</td>
                                                    <td>{{ $flat->sq_foot }}</td>
                                                    <td>{{ $flat->getFlatStatus->name }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <a href="{{ route('flats.edit', ['flat' => $flat->id]) }}" rel="tooltip" class="btn-floating cyan" data-original-title="Edit Flat" title="">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            {{-- <button type="button" rel="tooltip" class="btn-floating waves-effect waves-light btn-danger singleDelete ladda-button" data-original-title="Delete Flat" title="" data-style="zoom-in">
                                                                <i class="material-icons dp48">delete</i>
                                                            </button> --}}
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
@endsection

@section('customJs')
    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this Flat?';
        });
    </script>
@endsection