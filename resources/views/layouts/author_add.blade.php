<div style="display:none">
    <div id="add-user" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcgreen pt10 pb10 pl20 pr20 mb30">Add New Authorized User</h3>
            <form id="add-author-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Authorized User Name</label>
                                <input type="text" value="" placeholder="" name="name" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Authorized User Phone Number</label>
                                <input type="tel" value="" placeholder="" name="phone" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" id="add-author-save" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>