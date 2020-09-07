<?php

use App\Helpers\DataProvider;
use App\Helpers\CommonFunction;

$incomeCategoryList = CommonFunction::getIncomeCategoryWithNameAndId();
$paymentModeList = DataProvider::getPaymentModeList();

?>
<form id="create_income_form" class="col s12 create_income_form"  data-action="create" data-module="income" data-url="incomes" method="POST" action="#">
    <div id="createEditIncomeModal" class="modal">
        <div class="modal-content">
            <h5 class="center-align mb-2">Create Income</h5>
            <div class="row">
                <div class="input-field col l4 m4 s12">
                    {{ Form::select('income_category_id', $incomeCategoryList, null, ['class' => 'material-select', 'id' =>'income_category_id', 'placeholder' => 'Select Income Category', 'data-size' => 2]) }}
                    <label for="income_category_id">Income Category *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="amount" name="amount">
                    <label for="amount">Amount *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="payment_date" class="datepicker" name="payment_date">
                    <label for="payment_date">Payment Date *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l4 m4 s12">
                    <input type="text" id="received_from" name="received_from">
                    <label for="received_from">Received From</label>
                </div>

                <div class="col l4 m4 s12 display-inline mt-2">
                    {{ Form::select(
                        'payment_mode_id',
                        $paymentModeList,
                        null,
                        [
                            'class' => 'material-select payment_mode_id',
                            'id' =>'payment_mode_id',
                            'placeholder' => 'Select Payment Mode',
                            'data-size' => 2
                        ]
                    ) }}
                    <label for="payment_mode_id">Payment Mode *</label>
                </div>

                <div id="cheque_no_container" style="display: none;">
                    <div class="input-field col l4 m4 s12">
                        <input type="text" id="cheque_no" name="cheque_no">
                        <label for="cheque_no">Cheque No. *</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 right-align right">
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
