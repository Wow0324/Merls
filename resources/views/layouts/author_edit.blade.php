<div style="display:none">
    <div id="edit-user" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcgray pt10 pb10 pl20 pr20 mb30">Edit Global Authorized Users</h3>
            <form id="edit-author-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Authorized User Name</label>
                                <input type="text" value="" placeholder="" name="name" id="edit-author-name" class="lightgray">
                                <input type="hidden" value="" placeholder="" name="id" id="edit-author-id" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Authorized Phone Number</label>
                                <input type="tel" value="" placeholder="" name="phone" id="edit-author-phone" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button id="edit-author-save" type="button" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>