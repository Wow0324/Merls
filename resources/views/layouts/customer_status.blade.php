<div style="display:none">
    <div id="approve-customer" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Customer Approval</h3>
            <h4 class="fs20 mb20" id="customer-status-email"></h4>
            <form id="customer-status-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <input type="hidden" value="" id="customer-status-id" name="id">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Status</label>
                                <select name="approve" id="customer-status-approved">
                                    <option value="1">Approved</option>
                                    <option value="0">Pending</option>
                                    <option value="2">Denied</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" class="btn btn-red" id="customer-status-save">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>