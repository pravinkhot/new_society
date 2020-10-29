@extends('layouts.app')

@section('mainTitle', 'Members')

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
                                <h4 class="card-title">Member List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a id="createMemberButton" class="p-0" href="{{ route('members.create') }}" target="_self">
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
                                            'Name', 'Email', 'Mobile No.'
                                        ];
                                    ?>
                                    <thead>
                                        <tr>
                                            @foreach($theadList as $thead)
                                                <th>{{ $thead }}</th>
                                            @endforeach
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($memberList))
                                            @foreach($memberList as $member)
                                                <tr id="{{ $member->id }}">
                                                    <td>{{ $member->full_name }}</td>
                                                    <td>{{ $member->email }}</td>
                                                    <td>{{ $member->mobile_no }}</td>

                                                    <td>
                                                        <a href="{{ route('members.edit', ['member' => $member->id]) }}" class="btn btn-small indigo accent-3 editMemberButton" rel="tooltip" data-tooltip="Edit Service">
                                                            <i class="fa fa-edit mr-0"></i>
                                                        </a>
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

                                @if($memberList->count() > 0)
                                    {{ $memberList->links() }}
                                @endif
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
            deleteConfirmMsg = 'Are you sure you want to delete this member?';
        });
    </script>
@endsection
