<div style="display:none">
    <div id="edit-property" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Edit Property</h3>
            <form id="edit-property-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Name</label>
                                <input type="text" value="{{$activeProperty ? $activeProperty->name : ''}}" placeholder="" name="name" class="lightgray">
                                <input type="hidden" value="{{$activeProperty ? $activeProperty->id : 0}}" placeholder="" name="id" class="lightgray">
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                <label for="">Property Address</label>
                                <input type="text" value="{{$activeProperty ? $activeProperty->address : ''}}" placeholder="" name="address" class="lightgray">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" id="edit-property-save" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>