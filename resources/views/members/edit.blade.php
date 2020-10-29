@extends('layouts.app')

@section('mainTitle', 'Members')

@section('content')
    <?php
        use App\Helpers\CommonFunction;
        $flatList = CommonFunction::getFlatListWithWing();

        $userSocietyDetails = $memberDetail->getUserSocietyDetails()->where([
            'society_id' => \Session::get('user.society_id')
        ])
        ->first();

        $userFlatDetails = $memberDetail->getUserFlatDetails()
            ->where([
            'society_id' => \Session::get('user.society_id')
        ])
        ->get();
    ?>
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="row">
                        <input type="hidden" name="memberId" id="memberId" class="memberId" value="{{ $memberDetail->id }}">
                        <form id="editMemberForm" class="col s12 editMemberForm" method="POST" action="#" data-action="update" data-module="member" data-url="members/{{ $memberDetail->id }}">
                            @method('PUT')

                            <div class="card-title">
                                <div class="row">
                                    <div class="mb-1 col s12 form-title">
                                        <h4 class="card-title mb-0">Update Member Information</h4>

                                        <div>
                                            <button type="submit" class="btn btn-small indigo accent-3 ladda-button" data-style="zoom-in">
                                                <i class="fa fa-save"></i>
                                                Save Changes
                                            </button>

                                            <a class="btn btn-small red accent-3" href="{{ route('members.index') }}">
                                                <i class="fa fa-close"></i>
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card blue">
                                        <div class="card-content p-0">
                                            <span class="card-title pt-2 pb-1 pl-2 pr-2 white-text">Basic Information</span>

                                            <div class="pt-2 pl-2 pr-2 white">
                                                <div class="row">
                                                    <div class="input-field col l4 m4 s12">
                                                        <input type="text" id="first_name" name="first_name" value="{{ $memberDetail->first_name }}" />
                                                        <label for="first_name">First Name *</label>
                                                    </div>

                                                    <div class="input-field col l4 m4 s12">
                                                        <input type="text" id="last_name" name="last_name" value="{{ $memberDetail->last_name }}" />
                                                        <label for="last_name">Last Name *</label>
                                                    </div>

                                                    <div class="input-field-margin col l4 m4 s12 display-inline">
                                                        <label>Gender</label>
                                                        <label>
                                                            <input type="radio" value="male" name="gender" {{ ('male' === $memberDetail->gender) ? "checked" : "" }} checked="" />
                                                            <span>Male</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" value="female" name="gender" {{ ('female' === $memberDetail->gender) ? "checked" : "" }} />
                                                            <span>Female</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col l4 m4 s12">
                                                        <input type="text" id="email" name="email" value="{{ $memberDetail->email }}" />
                                                        <label for="email">Email *</label>
                                                    </div>

                                                    <div class="input-field col l4 m4 s12">
                                                        <input type="text" id="mobile_no" name="mobile_no" value="{{ $memberDetail->mobile_no }}" />
                                                        <label for="mobile_no">Mobile No. *</label>
                                                    </div>

                                                    <div class="input-field col l4 m4 s12">
                                                        <input type="text" id="dob" class="datepicker" name="dob" value="{{ $memberDetail->dob }}" readonly="" />
                                                        <label for="dob">DOB *</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field-margin col l4 m4 s12">
                                                        <label>
                                                            <input type="checkbox" id="isAssociationMember" class="filled-in isAssociationMember" name="is_association_member" value="1"
                                                                {{ 1 === $userSocietyDetails->is_association_member ? 'checked' : '' }} />
                                                            <span>Is Association Member</span>
                                                        </label>
                                                    </div>

                                                    <div class="input-field col l4 m4 s12 {{ 0 === $userSocietyDetails->is_association_member ? 'display-none' : '' }}" id="designationContainer">
                                                        <input type="text" id="designation" name="designation" value="{{ $userSocietyDetails->designation }}" />
                                                        <label for="designation">Designation *</label>
                                                    </div>

                                                    <div class="input-field-margin col l4 m4 s12">
                                                        <label>
                                                            <input type="checkbox" id="isAdmin" class="filled-in makeAdmin" name="is_admin" value="1"
                                                                {{ 1 === $userSocietyDetails->is_admin ? 'checked' : '' }} />
                                                            <span>Make Admin</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card overflow-unset blue">
                                        <div class="card-content p-0">
                                            <span class="card-title pt-2 pb-1 pl-2 pr-2 white-text">Flats Information</span>

                                            <div class="pt-2 pl-2 pr-2 white">
                                                <div class="row">
                                                    <div class="col l12 m12 s12">
                                                        <table class="addFlatContainer">
                                                            <tbody>
                                                            @foreach($userFlatDetails as $userFlatKey => $userFlat)
                                                                <tr class="border-bottom-none">
                                                                    <td>
                                                                        {{ Form::select('flat_id[]', $flatList, $userFlat->flat_id, ['class' =>'flat_id', 'placeholder' => 'Select Flat', 'data-size' => 5]) }}
                                                                    </td>
                                                                    <td class="vertical-text-middle center-align">
                                                                        <label>
                                                                            <input type="radio" class="ownerTenant" name="ot[{{ $userFlatKey }}]" value="1"
                                                                                {{ (null === $userFlat->owner_tenant || 1 === $userFlat->owner_tenant) ? 'checked' : '' }} />
                                                                            <span>Owner</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" class="ownerTenant" name="ot[{{ $userFlatKey }}]" value="2"
                                                                                {{ (2 === $userFlat->owner_tenant) ? 'checked' : '' }} />
                                                                            <span>Tenant</span>
                                                                        </label>
                                                                    </td>
                                                                    <td class="center-align">
                                                                        <button type="button" class="btn red removeFlat accent-3 btn-small">
                                                                            <i class="fa fa-close mr-0"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
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
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function () {
            flatList = '{{ Form::select('flat_id[]', $flatList, null, ['class' =>'flat_id', 'placeholder' => 'Select Flat', 'data-size' => 5]) }}';
        })
    </script>

    <script src="{{ asset('js/custom/member.js') }}"></script>
@endsection
