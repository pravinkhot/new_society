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
                    <div class="row">
                        <input type="hidden" name="flatId" id="flatId" class="flatId" value="{{ $flatDetail->id }}">
                        <form id="editFlatForm" class="col s12 editFlatForm" method="POST" action="#" data-action="update" data-module="flat" data-url="wings/flats/{{ $flatDetail->id }}">
                            @method('PUT')

                            <div class="card-title">
                                <div class="row">
                                    <div class="mb-1 col s12 form-title">
                                        <h4 class="card-title mb-0">Update Flat Information</h4>

                                        <div>
                                            <button type="submit" class="btn btn-small indigo accent-3 ladda-button" data-style="zoom-in">
                                                <i class="fa fa-save"></i>
                                                Save Changes
                                            </button>

                                            <a class="btn btn-small red accent-3" href="{{ route('flats.index') }}">
                                                <i class="fa fa-close"></i>
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                        <input type="radio" value="1" name="flat_status_id" {{ (1  === $flatDetail->flat_status_id || empty($flatDetail->flat_status_id)) ? "checked" : "" }}>
                                        <span>Owner</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="2" name="flat_status_id" {{ 2 === $flatDetail->flat_status_id ? "checked" : "" }}>
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
