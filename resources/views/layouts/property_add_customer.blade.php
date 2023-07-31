<div style="display:none">
    <div id="add-property" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcgreen pt10 pb10 pl20 pr20 mb30">Add New Property</h3>
            <form id="add-property-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Name</label>
                                <input type="text" value="" placeholder="" name="name" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Address</label>
                                <input type="text" value="" placeholder="" name="address" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" id="add_property_save" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>