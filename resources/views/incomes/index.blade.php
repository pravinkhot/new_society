@extends('layouts.app')

@section('mainTitle', 'Incomes')

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
                                <h4 class="card-title">Income List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                @if(isset($currentEntityPermissions['add']) && $currentEntityPermissions['add'] == 1)
                                    <ul class="tabs">
                                        <li class="tab col s6 p-0">
                                        	<a id="createIncomeButton" href="#" class="p-0 createResourceBtn ladda-button" title="Create Income" data-module="income" data-url="incomes/create" data-style="zoom-in">
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
                                            'Income Category', 'Amount', 'Payment Mode', 'Payment Date', 'Received By'
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
                                        @if($incomeList->count() > 0)
                                            @foreach($incomeList as $income)
                                                <tr id="">
                                                    <td>{{ $income->getIncomeCategory->name }}</td>
                                                    <td>{{ $income->amount }}</td>
                                                    <td>{{ $paymentModeList[$income->payment_mode_id] ?? null }}</td>
                                                    <td>{{ $income->payment_date }}</td>
                                                    <td>{{ $income->received_from }}</td>
                                                    @if(isset($currentEntityPermissions['edit']) && $currentEntityPermissions['edit'] == 1)
                                                        <td>
                                                            <button type="button" rel="tooltip" class="btn-floating cyan editResourceBtn editIncomeButton" data-id="{{ $income->id }}" data-original-title="Edit Income" data-module="income" data-url="incomes/{{ $income->id }}/edit" data-style="zoom-in">
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

    <div id="createEditIncomeModalContainer"></div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/incomes.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this Income?';
        });
    </script>
@endsection
