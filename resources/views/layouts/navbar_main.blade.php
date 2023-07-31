<div style="display:none">
    <div id="navigation" class="popup menu" style="width: 500px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcred pt10 pb10 pl20 pr20 mb30">Navigation</h3>
            <nav class="main-menu">
                <ul>
                    <li><a href="{{url('/')}}">Dashboard</a></li>
                    @if ($user->role == 0)
                        <li><a href="#add-admin-property" class="fancybox-inline">Add Property</a></li>
                        <li><a href="#add-user" class="fancybox-inline">Add Authorized Users</a></li>
                        <li><a href="#add-dispatcher" class="fancybox-inline">Add Dispatcher</a></li>
                        <li><a href="#add-customer" class="fancybox-inline">Add Customer</a></li>
                    @elseif ($user->role == 1)
                        <li><a href="#add-property" class="fancybox-inline">Add Property</a></li>
                        <li><a href="#add-user" class="fancybox-inline">Add Authorized Users</a></li>
                    @endif
                    <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>