<?php

use App\Helpers\CommonFunction;
use App\Helpers\DataProvider;

$expenseCategoryList = CommonFunction::getExpenseCategoryList();
$paymentModeList = DataProvider::getPaymentModeList();
?>

<form id="create_expense_form" class="col s12 create_expense_form" data-action="create" data-module="expense" data-url="expenses" method="POST" action="#">
    <div id="createExpenseModal" class="modal">
        <div class="modal-content">
            <h5 class="center-align mb-2">Create Expense</h5>

            <div class="row">
                <div class="input-field col l4 m4 s12">
                    {{ Form::select('expense_category_id', $expenseCategoryList, null, ['class' => 'material-select', 'id' =>'expense_category_id', 'placeholder' => 'Select Expense Category', 'data-size' => 2]) }}
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
                    {{ Form::select('authorised_by', [1 => 'Pravin'], null, ['class' => 'material-select', 'id' =>'authorised_by', 'placeholder' => 'Select Authorised Person', 'data-size' => 5]) }}
                    <label for="authorised_by">Expense Authorised By *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l4 m4 s12">
                    {{ Form::select('payment_mode_id', $paymentModeList, null, ['class' => 'material-select', 'id' =>'payment_mode_id', 'placeholder' => 'Select Payment Mode', 'data-size' => 2]) }}
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
                <div class="input-field col l6 m6 s12 right-align right">
                    <a href="#" class="modal-close btn">Close</a>
                    <button type="submit" class="btn cyan waves-effect waves-light ladda-button" data-style="zoom-in">
                        Submit
                        <span class="ripple-container"> </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
