@extends('layouts.app')

@section('mainTitle', 'Members')

@section('content')
    <?php
        use App\Helpers\CommonFunction;
        $flatList = CommonFunction::getFlatListWithWing();
    ?>

    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="row">
                        <form id="createMemberForm" class="col s12 createMemberForm" method="POST" action="#" data-action="create" data-module="member" data-url="members">
                            <div class="card-title">
                                <div class="row">
                                    <div class="mb-1 col s12 form-title">
                                        <h4 class="card-title mb-0">Create New Member</h4>

                                        <div>
                                            <button type="submit" class="btn btn-small indigo accent-3 ladda-button" data-style="zoom-in">
                                                <i class="fa fa-plus"></i> Create
                                            </button>

                                            <a class="btn btn-small red accent-3" href="{{ route('members.index') }}">
                                                <i class="fa fa-close"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="first_name" name="first_name" />
                                    <label for="first_name">First Name *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="last_name" name="last_name" />
                                    <label for="last_name">Last Name *</label>
                                </div>

                                <div class="input-field-margin col l4 m4 s12 display-inline">
                                    <label>Gender</label>
                                    <label>
                                        <input type="radio" value="male" name="gender" checked="" />
                                        <span>Male</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="female" name="gender" />
                                        <span>Female</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="email" name="email" />
                                    <label for="email">Email *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="mobile_no" name="mobile_no" />
                                    <label for="mobile_no">Mobile No. *</label>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="dob" class="datepicker" name="dob" readonly="" />
                                    <label for="dob">DOB *</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field-margin col l4 m4 s12">
                                    <label>
                                        <input type="checkbox" id="isAssociationMember" class="filled-in isAssociationMember" name="is_association_member" value="1" />
                                        <span>Is Association Member</span>
                                    </label>
                                </div>

                                <div class="input-field col l4 m4 s12 display-none" id="designationContainer">
                                    <input type="text" id="designation" name="designation" />
                                    <label for="designation">Designation *</label>
                                </div>

                                <div class="input-field-margin col l4 m4 s12">
                                    <label>
                                        <input type="checkbox" id="isAdmin" class="filled-in makeAdmin" name="is_admin" value="1" />
                                        <span>Make Admin</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <table class="addFlatContainer">
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="button" class="btn btn-small addFlat blue">
                                        <i class="fa fa-plus"></i> Add Another Flat
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
    <script type="text/javascript">
        $(document).ready(function () {
            flatList = '{{ Form::select('flat_id', $flatList, null, ['class' =>'flat_id', 'placeholder' => 'Select Flat', 'data-size' => 5]) }}';
        });
    </script>

    <script src="{{ asset('js/custom/member.js') }}"></script>
@endsection
