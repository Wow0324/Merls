<div style="display:none">
    <div id="edit-customer" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Edit Customer (usernames cannot be changed)</h3>

            <form id="edit-customer-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <input type="hidden" placeholder="" name="id" id="edit-customer-id">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="email">Email</label>
                                <input type="text" placeholder="" name="email" id="edit-customer-email">
                                <span class="small text-danger" id="customer-email-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="phone">Phone</label>
                                <input type="tel" placeholder="" name="phone" id="edit-customer-phone">
                                <span class="small text-danger" id="customer-phone-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="psw">Password</label>
                                <input type="password" placeholder="" name="password" id="edit-customer-password">
                                <span class="small text-danger" id="customer-password-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="cpsw">Confirm Password</label>
                                <input type="password" placeholder="" name="password_confirmation">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="first_name">First Name</label>
                                <input type="text" placeholder="" name="first_name" id="edit-customer-firstname">
                                <span class="small text-danger" id="customer-firstname-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="lastname">Last Name</label>
                                <input type="text" placeholder="" name="last_name" id="edit-customer-lastname">
                                <span class="small text-danger" id="customer-lastname-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="address">Address</label>
                                <input type="text" placeholder="" name="address" id="edit-customer-address">
                                <span class="small text-danger" id="customer-address-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="city">City</label>
                                <input type="text" placeholder="" name="city" id="edit-customer-city">
                                <span class="small text-danger" id="customer-city-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="state">State</label>
                                <input type="text" placeholder="" name="state" id="edit-customer-state">
                                <span class="small text-danger" id="customer-state-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="zipcode">Zipcode</label>
                                <input type="text" placeholder="" name="zipcode" id="edit-customer-zipcode">
                                <span class="small text-danger" id="customer-zipcode-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button id="edit-customer-save" type="button" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>