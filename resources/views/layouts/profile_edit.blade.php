<div style="display:none">
    <div id="profile" class="popup" style="width: 700px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Profile (usernames cannot be changed)</h3>

            <form id="edit-profile-form" class="signup-form site-form" action="{{route('update_profile')}}" method="POST">
                <fieldset>
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="email">Username</label>
                                <input type="text" placeholder="" name="email" id="email" value="{{$user->email}}">
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="phone">Phone</label>
                                <input type="tel" placeholder="" name="phone" id="phone" value="{{$user->phone}}">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="psw">Password</label>
                                <input type="password" placeholder="" name="password" id="password" value="">
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="cpsw">Confirm Password</label>
                                <input type="password" placeholder="" name="password_confirmation" id="password_confirmation" value="">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="first_name">First Name</label>
                                <input type="text" placeholder="" name="first_name" value="{{$user->first_name}}">
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="lastname">Last Name</label>
                                <input type="text" placeholder="" name="last_name" value="{{$user->last_name}}">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="address">Address</label>
                                <input type="text" placeholder="" name="address" id="address" value="{{$user->address}}">
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="city">City</label>
                                <input type="text" placeholder="" name="city" id="city" value="{{$user->city}}">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <label for="state">State</label>
                                <input type="text" placeholder="" name="state" id="state" value="{{$user->state}}">
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <label for="zipcode">Zipcode</label>
                                <input type="text" placeholder="" name="zipcode" id="zipcode" value="{{$user->zipcode}}">
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <p class="text-right">
                                <button id="edit_profile_save" type="button" onClick="" class="btn btn-red">Save</button>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>