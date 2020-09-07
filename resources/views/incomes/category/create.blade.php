<form id="create_income_category_form" class="col s12 create_income_category_form" data-action="create" data-module="incomeCategory" data-url="incomes/category" method="POST" action="#">
    <div id="createEditIncomeCategoryModal" class="modal">
        <div class="modal-content">
            <h5 class="center-align mb-2">Create Income Category</h5>
            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <input type="text" id="name" name="name">
                    <label for="name">Name *</label>
                </div>

                <div class="col l6 m6 s12 display-inline mt-2">
                    <label>Status *</label><br/>
                    <label>
                        <input type="radio" value="1" name="status" checked="">
                        <span>Active</span>
                    </label>
                    <label>
                        <input type="radio" value="0" name="status">
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
