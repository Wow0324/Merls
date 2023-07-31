<div style="display:none">
    <div id="add-admin-property" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 id="property-title" class="fs18 white bcgreen pt10 pb10 pl20 pr20 mb30">Add New Property</h3>
            <form id="add-property-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <input type="hidden" value="0" id="property-id" name="id">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Name</label>
                                <input type="text" value="" id="property-name" name="name" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Address</label>
                                <input type="text" value="" id="property-address" name="address" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Jurisdiciton</label>
                                <input type="text" value="" name="jurisdiction" id="property-jurisdiction">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Customer</label>
                                @if (count($all_customers) > 0)
                                    <select name="user_id" id="property-customer">
                                        @foreach ($all_customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->email}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    No customers
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Status</label>
                                <select name="approve" id="property-approve">
                                    <option value="1">Approved</option>
                                    <option value="0" selected>Pending</option>
                                    <option value="2">Denied</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right" id="property-button">
                                <button type="button" id="add_property_save" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>