@extends('layouts.app')

@section('mainTitle', 'Expenses')

@section('content')  
    <?php
        $expenseCategoryList = CommonFunction::getExpenseCategoryList();
        $paymentModeList = \App\Helpers\DataProvider::getPaymentModeList();
    ?>
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Create Expense</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form id="create_expense_form" class="col s12 create_expense_form">
                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    {{ Form::select('expense_category_id', $expenseCategoryList, null, ['class' => '', 'id' =>'expense_category_id', 'placeholder' => 'Select Expense Category', 'data-size' => 2]) }}
                                    <label for="expense_category_id">Expense Category *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="vendor_name" name="vendor_name">
                                    <label for="vendor_name">Vendor Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="amount" name="amount">
                                    <label for="amount">Amount *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="bill_date" class="datepicker" name="bill_date">
                                    <label for="bill_date">Bill Date *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="payment_date" class="datepicker" name="payment_date">
                                    <label for="payment_date">Payment Date *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    {{ Form::select('authorised_by', [1 => 'Pravin'], null, ['class' => '', 'id' =>'authorised_by', 'placeholder' => 'Select Authorised Person', 'data-size' => 5]) }}
                                    <label for="authorised_by">Expense Authorised By *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    {{ Form::select('payment_mode_id', $paymentModeList, null, ['class' => '', 'id' =>'payment_mode_id', 'placeholder' => 'Select Payment Mode', 'data-size' => 2]) }}
                                    <label for="payment_mode_id">Payment Mode *</label>
                                </div>

                                <div id="cheque_no_container" style="display: none;">
                                    <div class="input-field col l4 m4 s12">
                                        <input type="text" id="cheque_no" name="cheque_no">
                                        <label for="cheque_no">Cheque No. *</label>
                                    </div>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <textarea id="description" class="materialize-textarea" name="description"></textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6 right-align right">
                                    <a class="btn mr-1" href="{{ route('expenses.index') }}">Back</a>
                                    <button type="submit" class="btn cyan waves-effect waves-light ladda-button" data-style="zoom-in">
                                        Submit
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/expenses.js') }}"></script>
@endsection