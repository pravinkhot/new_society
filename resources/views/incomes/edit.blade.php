<?php

use App\Helpers\CommonFunction;
use App\Helpers\DataProvider;

$incomeCategoryList = CommonFunction::getIncomeCategoryWithNameAndId();
$paymentModeList = DataProvider::getPaymentModeList();

?>
<input type="hidden" name="incomeId" id="incomeId" class="incomeId" value="{{ $incomeDetail->id }}">
<form id="edit_income_form" class="col s12 edit_income_form" data-action="update" data-module="income" data-url="incomes/{{ $incomeDetail->id }}" method="POST" action="#">
    @method('PUT')
    <div id="editIncomeModal" class="modal">
        <div class="modal-content">
            <h5 class="center-align mb-2">Edit Income</h5>
            <div class="row">
                <div class="input-field col l4 m4 s12">
                    {{ Form::select('income_category_id', $incomeCategoryList, $incomeDetail->income_category_id, ['class' => 'material-select', 'id' =>'income_category_id', 'placeholder' => 'Select Income Category', 'data-size' => 2]) }}
                    <label for="income_category_id">Income Category *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="amount" name="amount" value="{{ $incomeDetail->amount }}">
                    <label for="amount">Amount *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="payment_date" class="datepicker" name="payment_date" value="{{ $incomeDetail->payment_date }}">
                    <label for="payment_date">Payment Date *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l4 m4 s12">
                    <input type="text" id="received_from" name="received_from" value="{{ $incomeDetail->received_from }}">
                    <label for="received_from">Received From</label>
                </div>

                <div class="col l4 m4 s12 display-inline mt-2">
                    {{ Form::select(
                        'payment_mode_id',
                        $paymentModeList,
                        $incomeDetail->payment_mode_id,
                        [
                            'class' => 'material-select payment_mode_id',
                            'id' =>'payment_mode_id',
                            'placeholder' => 'Select Payment Mode',
                            'data-size' => 2
                        ]
                    ) }}
                    <label for="payment_mode_id">Payment Mode *</label>
                </div>

                <div id="cheque_no_container" style="{{ ($incomeDetail->payment_mode_id != 2) ? 'display: none' : '' }};">
                    <div class="input-field col l4 m4 s12">
                        <input type="text" id="cheque_no" name="cheque_no" value="{{ $incomeDetail->cheque_no }}">
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
