<div style="display:none">
    <div id="delete-customer" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcred2 pt10 pb10 pl20 pr20 mb30">Delete Customer</h3>
            <form id="delete-customer-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row mb50">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Customer Email</label>
                                <input type="text" value="" placeholder="" name="email" id="delete-customer-name" class="lightgray">
                                <input type="hidden" value="" placeholder="" name="id" id="delete-customer-id">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Customer Phone Number</label>
                                <input type="tel" value="" name="phone" id="delete-customer-phone" class="lightgray">
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
                                <button type="button" class="btn btn-red2" id="delete-customer-save">Delete</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>