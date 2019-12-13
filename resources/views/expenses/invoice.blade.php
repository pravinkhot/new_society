@extends('layouts.app')

@section('mainTitle', 'Expenses')

@section('content')
    <?php
        $paymentModeList = \App\Helpers\DataProvider::getPaymentModeList();
    ?>
    <!--Invoice-->
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="basic-tabs" class="card card card-default scrollspy">
                <div class="card-content pt-5 pr-5 pb-5 pl-5">
                    <div id="invoice">
                        <div class="invoice-header">
                            <div class="row section">
                                <div class="col s12 m6 l6">
                                    <img class="mb-2 width-50" src="https://materializecss.com/res/materialize.svg" alt="society logo">
                                    <?php 
                                        $addressHead = [
                                            "address1","address2","city","state","country_id","pincode"
                                        ];
                                        $addressString = '';
                                        foreach ($addressHead as $value) {
                                            if (!empty($societyDetail->$value)) {
                                                if ($value == 'country_id') {
                                                    $addressString .= $societyDetail->getCountryDetail->name.", ";
                                                } else {
                                                    $addressString .= $societyDetail->$value.", ";
                                                }
                                            }
                                        }
                                        echo "<p>".trim($addressString, ', ')."</p>";
                                    ?>
                                </div>
                                <div class="col s12 m6 l6">
                                    <h4 class="text-uppercase right-align strong mb-5">Invoice</h4>
                                </div>
                            </div>
                            <div class="row section">
                                <div class="col s12 m6 l6">
                                    <h6 class="text-uppercase strong mb-2 mt-3">Recipient</h6>
                                    <p class="text-uppercase">{{ $expenseDetail->vendor_name }}</p>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="invoce-no right-align">
                                        <p><span class="strong">Invoice No.</span> {{ $expenseDetail->id }}</p>
                                    </div>
                                    <div class="invoce-no right-align">
                                    <p><span class="strong">Payment Date</span> {{ $expenseDetail->payment_date }}</p>
                                        <p><span class="strong">Bill Date</span> {{ $expenseDetail->bill_date }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-table">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <table class="highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-field="description">Description</th>
                                                <th data-field="amount">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $expenseDetail->description }}</td>
                                                <td>{{ $expenseDetail->amount }}</td>
                                            </tr>
                                            <tr class="border-none">
                                                <td></td>
                                                <td>Sub Total:</td>
                                                <td>${{ $expenseDetail->amount }}</td>
                                            </tr>
                                            <tr class="border-none">
                                                <td></td>
                                                <td class="cyan white-text pl-1">Grand Total</td>
                                                <td class="cyan strong white-text">{{ $expenseDetail->amount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-footer mt-6">
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <p><span class="strong">Payment Method:</span> <span>{{ $paymentModeList[$expenseDetail->payment_mode_id] }}</span></p>
                                    @if($expenseDetail->payment_mode_id == 2)
                                        <p class="strong">Cheque No: {{ $expenseDetail->cheque_no }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection
