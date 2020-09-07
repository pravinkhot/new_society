@extends('layouts.app')

@section('mainTitle', 'Expense Category')

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
                                <h4 class="card-title">Expense Category List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                        	<a id="createExpenseCategoryButton" href="#" class="p-0 createResourceBtn ladda-button" title="Create Expense Category" data-module="expenseCategory" data-url="expenses/category/create" data-style="zoom-in">
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
                                        @if($expenseCategoryList->count() > 0)
                                            @foreach($expenseCategoryList as $expenseCategory)
                                                <tr id="">
                                                    <td>{{ $expenseCategory->name }}</td>
                                                    <td>{{ $expenseCategory->status_name }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <button type="button" rel="tooltip" class="btn-floating cyan editResourceBtn editExpenseCategoryButton" data-original-title="Edit Expense Category" data-module="expenseCategory" data-id="{{ $expenseCategory->id }}" data-url="expenses/category/{{ $expenseCategory->id }}/edit" data-style="zoom-in">
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

    <div id="createEditExpenseCategoryModalContainer"></div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/expenseCategory.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this Expense Category?';
        });
    </script>
@endsection
