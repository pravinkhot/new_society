@extends('layouts.app')

@section('mainTitle', 'Flats')

@section('content')

    <?php
    use App\Helpers\CommonFunction;

    $wingList = CommonFunction::getWingList();
    ?>

    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Create Flat</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form id="create_flat_form" class="col s12 create_flat_form">
                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="flat_no" name="flat_no">
                                    <label for="flat_no">Flat No *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    {{ Form::select('wing_id', $wingList, null, ['class' => '', 'id' =>'wing_id', 'placeholder' => 'Select Wing', 'data-size' => 5]) }}
                                    <label for="wing_id">Flat Wing *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="sq_foot" name="sq_foot">
                                    <label for="sq_foot">Square Foot *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="intercom" name="intercom">
                                    <label for="intercom">Intercom </label>
                                </div>

                                <div class="col l4 m4 s12 display-inline mt-2">
                                    <label>
                                        <input type="radio" value="1" name="flat_status_id" checked="">
                                        <span>Owner</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="2" name="flat_status_id">
                                        <span>Rented</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="owner_fn" name="owner_fn">
                                    <label for="owner_fn">Owner First Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="owner_ln" name="owner_ln">
                                    <label for="owner_ln">Owner Last Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="owner_number" name="owner_number">
                                    <label for="owner_number">Owner Mobile Number *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6 right-align right">
                                    <a class="btn mr-1" href="{{ route('flats.index') }}">Back</a>
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
    <script src="{{ asset('js/custom/flats.js') }}"></script>
@endsection
