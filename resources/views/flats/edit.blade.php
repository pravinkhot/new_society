@extends('layouts.app')

@section('mainTitle', 'Flats')

@section('content')  
    <?php
        $wingList = CommonFunction::getWingList();
    ?>
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Edit Flat</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <input type="hidden" name="flatId" id="flatId" class="flatId" value="{{ $flatDetail->id }}">
                        <form id="edit_flat_form" class="col s12 edit_flat_form">
                            @method('PUT')
                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="flat_no" name="flat_no" value="{{ $flatDetail->flat_no }}">
                                    <label for="flat_no">Flat No *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    {{ Form::select('wing_id', $wingList, $flatDetail->wing_id, ['class' => '', 'id' =>'wing_id', 'placeholder' => 'Select Wing', 'data-size' => 5]) }}
                                    <label for="wing_id">Flat Wing *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="sq_foot" name="sq_foot" value="{{ $flatDetail->sq_foot }}">
                                    <label for="sq_foot">Square Foot *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="intercom" name="intercom" value="{{ $flatDetail->intercom }}">
                                    <label for="intercom">Intercom </label>
                                </div>

                                <div class="col l4 m4 s12 display-inline mt-2">
                                    <label>
                                        <input type="radio" value="1" name="flat_status_id" {{ $flatDetail->flat_status_id == 1 ? "checked" : "" }}>
                                        <span>Owner</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="2" name="flat_status_id" {{ $flatDetail->flat_status_id == 2 ? "checked" : "" }}>
                                        <span>Rented</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="owner_fn" name="owner_fn" value="{{ $flatDetail->owner_fn }}">
                                    <label for="owner_fn">Owner First Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="owner_ln" name="owner_ln" value="{{ $flatDetail->owner_ln }}">
                                    <label for="owner_ln">Owner Last Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="owner_number" name="owner_number" value="{{ $flatDetail->owner_number }}">
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