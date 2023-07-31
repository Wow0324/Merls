<div style="display:none">
    <div id="add-dispatcher" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Add Dispatcher</h3>

            <form id="add-dispatcher-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="email">Email</label>
                                <input type="text" placeholder="" name="email" id="add-dispatcher-email">
                                <span class="small text-danger" id="dispatcher-email-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="phone">Phone</label>
                                <input type="tel" placeholder="" name="phone" id="add-dispatcher-phone">
                                <span class="small text-danger" id="dispatcher-phone-add-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="psw">Password</label>
                                <input type="password" placeholder="" name="password" id="add-dispatcher-password">
                                <span class="small text-danger" id="dispatcher-password-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="cpsw">Confirm Password</label>
                                <input type="password" placeholder="" name="password_confirmation" id="add-dispatcher-passwordconfirmation">
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button id="add-dispatcher-save" type="button" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>