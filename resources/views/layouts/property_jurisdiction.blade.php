<div style="display:none">
    <div id="property-jurisdiction-dialog" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcgray pt10 pb10 pl20 pr20 mb30">Property Jurisdiction</h3>
            <h4 class="fs20 mb20">{{$activeProperty != null ? $activeProperty->name : ''}}</h4>
            <form id="jurisdiction-edit-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Jurisdiciton</label>
                                <input type="text" value="{{$activeProperty ? $activeProperty->jurisdiction : ''}}" placeholder="" name="jurisdiction" id="edit-jurisdiction-value">
                                <input type="hidden" value="{{$activeProperty && $activeProperty ? $activeProperty->id : 0}}" placeholder="" name="id">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <butoton type="button" class="btn btn-red" id="jurisdiction-edit-save">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>