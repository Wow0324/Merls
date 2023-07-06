<div style="display:none">
    <div id="property-status" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Property Approval</h3>
            <h4 class="fs20 mb20">{{$activeProperty->name}}</h4>
            <form id="property-status-form" class="signup-form site-form">
                <fieldset>
                    @csrf
                    <input type="hidden" value="{{$activeProperty ? $activeProperty->id : 0}}" placeholder="" name="id">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="">Status</label>
                                <select name="approve">
                                    <option value="1" {{$activeProperty->approved == 1 ? 'selected' : ''}}>Approved</option>
                                    <option value="0" {{$activeProperty->approved == 0 ? 'selected' : ''}}>Pending</option>
                                    <option value="2" {{$activeProperty->approved == 2 ? 'selected' : ''}}>Denied</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button type="button" class="btn btn-red" id="property-status-save">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>