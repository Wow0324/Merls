<div style="display:none">
    <div id="delete-user" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcred2 pt10 pb10 pl20 pr20 mb30">Delete Authorized Users</h3>
            <form id="delete-author-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row mb50">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Authorized User Name</label>
                                <input type="text" value="" placeholder="" name="name" id="delete-author-name" class="lightgray">
                                <input type="hidden" value="" placeholder="" name="id" id="delete-author-id" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Authorized Phone Number</label>
                                <input type="tel" value="616-278-1118" placeholder="" name="phone" id="delete-author-phone" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Type DELETE below and click the delete button</label>
                                <input type="tel" value="" placeholder="DELETE" name="verify" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" class="btn btn-red2" id="delete-author-save">Delete</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>