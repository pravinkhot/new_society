<input type="hidden" name="expenseCategoryId" id="expenseCategoryId" class="expenseCategoryId" value="{{ $expenseCategoryDetail->id }}">
<form id="edit_expense_category_form" class="col s12 edit_expense_category_form"  data-action="update" data-module="expenseCategory" data-url="expenses/category/{{ $expenseCategoryDetail->id }}" method="POST" action="#">
    @method('PUT')
    <div id="createEditExpenseCategoryModal" class="modal">
        <div class="modal-content">
            <h5 class="center-align mb-2">Edit Expense Category</h5>
            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <input type="text" id="name" name="name" value="{{ $expenseCategoryDetail->name }}">
                    <label for="name">Name *</label>
                </div>

                <div class="col l6 m6 s12 display-inline mt-2">
                    <label>Status *</label><br/>
                    <label>
                        <input type="radio" value="1" name="status" {{ $expenseCategoryDetail->status === true ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>
                    <label>
                        <input type="radio" value="0" name="status" {{ $expenseCategoryDetail->status === false ? 'checked' : '' }}>
                        <span>Inactive</span>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 right-align right">
                    <a href="#" class="modal-close btn">Close</a>
                    <button type="submit" class="btn cyan waves-effect waves-light ladda-button" data-style="zoom-in">
                        Submit
                        <span class="ripple-container"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
