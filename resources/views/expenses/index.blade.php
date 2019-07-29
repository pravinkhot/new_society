@extends('layouts.app')

@section('mainTitle', 'Expenses')

@section('content')
    <?php
        $currentEntityPermissions = \Request::get('permissionDetails')['currentEntityPermissions'];
        $paymentModeList = \App\Helpers\DataProvider::getPaymentModeList();
    ?>
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Expense List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                            <a class="p-0" href="{{ route('expenses.create') }}" target="_self">
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
                                            'Expense Category', 'Vendor Name', 'Amount', 'Payment Mode', 'Payment Date', 'Created By'
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
                                        @if($expenseList->count() > 0)
                                            @foreach($expenseList as $expense)
                                                <tr id="{{ $expense->id }}">
                                                    <td>{{ $expense->getExpenseCategory->name }}</td>
                                                    <td>{{ $expense->vendor_name }}</td>
                                                    <td>{{ $expense->amount }}</td>
                                                    <td>{{ $paymentModeList[$expense->payment_mode_id] }}</td>
                                                    <td>{{ $expense->payment_date }}</td>
                                                    <td>{{ $expense->getCreatedByUser->full_name }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <a href="{{ route('expenses.edit', ['expenseId' => $expense->id]) }}" rel="tooltip" class="btn-floating cyan" data-original-title="Edit Expense" title="">
                                                                <i class="material-icons">edit</i>
                                                            </a>
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
            deleteConfirmMsg = 'Are you sure you want to delete this Expense?';
        });
    </script>
@endsection