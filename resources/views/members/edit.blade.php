@extends('layouts.app')

@section('mainTitle', 'Members')

@section('content')  
    <?php
        $roleList = CommonFunction::getRoleList();
    ?>
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Edit Member</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <input type="hidden" name="memberId" id="memberId" class="memberId" value="{{ $memberDetail->id }}">
                        <form id="edit_member_form" class="col s12 edit_member_form" method="POST" action="#">
                            @method('PUT')
                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="first_name" name="first_name" value="{{ $memberDetail->first_name }}">
                                    <label for="first_name">First Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="last_name" name="last_name" value="{{ $memberDetail->last_name }}">
                                    <label for="last_name">Last Name *</label>
                                </div>

                                <div class="col l4 m4 s12 display-inline mt-2">
                                    <label>Gender</label>
                                    <label>
                                        <input type="radio" value="male" name="gender" {{ ('male' === $memberDetail->gender) ? "checked" : "" }} checked="">
                                        <span>Male</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="female" name="gender" {{ ('female' === $memberDetail->gender) ? "checked" : "" }}/>
                                        <span>Female</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="email" name="email" value="{{ $memberDetail->email }}">
                                    <label for="email">Email *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="mobile_no" name="mobile_no" value="{{ $memberDetail->mobile_no }}">
                                    <label for="mobile_no">Mobile No. *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="dob" class="datepicker" name="dob" value="{{ $memberDetail->dob }}" readonly="">
                                    <label for="dob">DOB *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    {{ Form::select('role_id', $roleList, $memberDetail->role_id, ['class' => '', 'id' =>'role_id', 'placeholder' => 'Select Role', 'data-size' => 5]) }}
                                    <label for="role_id">Role *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6 right-align right">
                                    <a class="btn mr-1" href="{{ route('members.index') }}">Back</a>
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
    <script src="{{ asset('js/custom/member.js') }}"></script>
@endsection