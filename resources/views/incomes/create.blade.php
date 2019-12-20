<?php
    $incomeCategoryList = CommonFunction::getIncomeCategoryWithNameAndId();
    $paymentModeList = \App\Helpers\DataProvider::getPaymentModeList();
?>
<form id="create_income_form" class="col s12 create_income_form" method="POST" action="#">
    <div id="createEditIncomeModal" class="modal">
        <div class="modal-content">
            <h4 class="center-align mb-2">Create Income</h4>
            <div class="row">
                <div class="input-field col l4 m4 s12">
                    {{ Form::select('income_category_id', $incomeCategoryList, null, ['class' => '', 'id' =>'income_category_id', 'placeholder' => 'Select Income Category', 'data-size' => 2]) }}
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
                    <label>Payment Mode *</label></br>
                    @foreach($paymentModeList as $key => $value)
                        <label>
                            <input type="radio" value="{{ $key }}" name="payment_mode_id" {{ ($key == 1) ? "checked" : "" }}>
                            <span>{{ $value }}</span>
                        </label>
                    @endforeach
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
                    <a href="#!" class="modal-close btn">Close</a>
                    <button type="submit" class="btn cyan waves-effect waves-light ladda-button" data-style="zoom-in">
                        Submit
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
