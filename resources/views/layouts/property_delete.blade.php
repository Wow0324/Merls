<div style="display:none">
    <div id="delete-property" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcred2 pt10 pb10 pl20 pr20 mb30">Delete Property</h3>
            <form id="delete-property-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row mb50">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Name</label>
                                <input type="text" value="" placeholder="" name="email" id="delete-property-name" class="lightgray">
                                <input type="hidden" value="" placeholder="" name="id" id="delete-property-id">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Address</label>
                                <input type="text" value="" name="address" id="delete-property-address" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Type DELETE below and click the delete button</label>
                                <input type="text" value="" placeholder="DELETE" name="verify" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" class="btn btn-red2" id="delete-property-save">Delete</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>