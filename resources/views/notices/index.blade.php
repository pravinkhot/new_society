@extends('layouts.app')

@section('mainTitle', 'Notices')

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
                                <h4 class="card-title">Notice List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a id="createNoticeButton" href="#" class="p-0 createResourceBtn ladda-button" title="Create Notice" data-module="notice" data-url="notices/create" data-style="zoom-in">
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
                                            'Notice Title', 'Valid Date', 'Notice Type', 'Description'
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
                                        @if($noticeList->count() > 0)
                                            @foreach($noticeList as $notice)
                                                <tr id="{{ $notice->id }}">
                                                    <td>{{ $notice->title }}</td>
                                                    <td>{{ $notice->end_date }}</td>
                                                    <td>{{ $notice->type }}</td>
                                                    <td>{{ $notice->description }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <button type="button" rel="tooltip" class="btn btn-small indigo accent-3 editResourceBtn editNoticeButton ladda-button tooltip" data-tooltip="Edit Notice" data-module="notice" data-id="{{ $notice->id }}" data-url="notices/{{ $notice->id }}/edit" data-style="zoom-in">
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

    <div id="createEditNoticeModalContainer"></div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/notices.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this Notice?';
        });
    </script>
@endsection
