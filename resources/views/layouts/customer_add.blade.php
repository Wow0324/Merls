<div style="display:none">
    <div id="add-customer" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Add Customer</h3>

            <form id="add-customer-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="email">Email</label>
                                <input type="text" placeholder="" name="email" id="add-customer-email">
                                <span class="small text-danger" id="customer-email-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="phone">Phone</label>
                                <input type="tel" placeholder="" name="phone" id="add-customer-phone">
                                <span class="small text-danger" id="customer-phone-add-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="psw">Password</label>
                                <input type="password" placeholder="" name="password" id="add-customer-password">
                                <span class="small text-danger" id="customer-password-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="cpsw">Confirm Password</label>
                                <input type="password" placeholder="" name="password_confirmation" id="add-customer-passwordconfirmation">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="first_name">First Name</label>
                                <input type="text" placeholder="" name="first_name" id="add-customer-firstname">
                                <span class="small text-danger" id="customer-firstname-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="lastname">Last Name</label>
                                <input type="text" placeholder="" name="last_name" id="add-customer-lastname">
                                <span class="small text-danger" id="customer-lastname-add-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="address">Address</label>
                                <input type="text" placeholder="" name="address" id="add-customer-address">
                                <span class="small text-danger" id="customer-address-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="city">City</label>
                                <input type="text" placeholder="" name="city" id="add-customer-city">
                                <span class="small text-danger" id="customer-city-add-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="state">State</label>
                                <input type="text" placeholder="" name="state" id="add-customer-state">
                                <span class="small text-danger" id="customer-state-add-error" role="alert"></span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="zipcode">Zipcode</label>
                                <input type="text" placeholder="" name="zipcode" id="add-customer-zipcode">
                                <span class="small text-danger" id="customer-zipcode-add-error" role="alert"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button id="add-customer-save" type="button" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>