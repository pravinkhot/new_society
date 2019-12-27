@extends('layouts.app')

@section('mainTitle', 'Income Category')

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
                                <h4 class="card-title">Income Category List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                        	<a id="createIncomeCategoryButton" href="#" class="p-0" title="Create Income Category">
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
                                            'Name', 'Status'
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
                                        @if($incomeCategoryList->count() > 0)
                                            @foreach($incomeCategoryList as $incomeCategory)
                                                <tr id="">
                                                    <td>{{ $incomeCategory->name }}</td>
                                                    <td>{{ $incomeCategory->status_name }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <button type="button" rel="tooltip" class="btn-floating cyan editIncomeCategoryButton" data-id="{{ $incomeCategory->id }}" data-original-title="Edit Income">
                                                                <i class="material-icons">edit</i>
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

    <div id="createEditIncomeCategoryModalContainer"></div>
@endsection

@section('customJs')
	<script src="{{ asset('js/custom/common/ajaxModal.js') }}"></script>
    <script src="{{ asset('js/custom/incomeCategory.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this Income Category?';
        });
    </script>
@endsection