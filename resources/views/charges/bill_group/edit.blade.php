<div id="createEditChargeBillGroupModal" class="modal modal-sm">
    <div class="modal-content">
        <form id="editChargeBillGroupForm" class="col s12 editChargeBillGroupForm" data-action="update" data-module="chargeBillGroup" data-url="charges/bill_group/{{ $billGroupDetail->id }}" method="POST" action="#">
            @method('PUT')
            <input type="hidden" name="billGroupId" id="billGroupId" class="billGroupId" value="{{ $billGroupDetail->id }}" />

            <div class="row">
                <div class="input-field mt-0 col s12">
                    <h5 class="left mt-0"><b>Edit Bill Group</b></h5>
                    <div class="right">
                        <button type="submit" class="btn btn-small blue mr-1 waves-effect waves-light ladda-button" data-style="zoom-in">
                            <i class="fa fa-save"></i> Save Changes
                        </button>

                        <button type="button" class="btn btn-small new-group-btn red accent-3 modal-close">
                            <i class="fa fa-close"></i> Cancel
                        </button>
                    </div>

                    <div class="row">
                        <div class="input-field col l12 m12 s12">
                            <input type="text" id="name" name="name" value="{{ $billGroupDetail->name }}" />
                            <label for="name">Name *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l12 m12 s12">
                            <table class="addParticularContainer">
                                <tbody>
                                @foreach($billGroupDetail->particulars as $particular)
                                    <tr class="border-bottom-none">
                                        <td>
                                            <input name="particular[]" type="text" placeholder="Particular" value="{{ $particular->name }}" />
                                        </td>
                                        <td>
                                            <input name="amount[]" type="text" placeholder="Amount" value="{{ $particular->amount }}" />
                                        </td>
                                        <td>
                                            <button type="button" class="btn red removeParticular accent-3 btn-small">
                                                <i class="fa fa-close m0"></i>
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
                            <button type="button" class="btn btn-small addParticular green">
                                <i class="fa fa-plus"></i> Add A Particular
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
