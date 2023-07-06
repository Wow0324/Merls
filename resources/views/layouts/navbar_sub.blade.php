<div style="display:none">
    <div id="choose-property" class="popup menu" style="width: 500px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcred pt10 pb10 pl20 pr20 mb30">Search Type</h3>
            <nav class="main-menu">
                <ul>
                    @if ($user->role == 0)
                        <li><a href="{{route('admin.customers')}}">Customers</a></li>
                        <li><a href="{{route('admin.properties')}}">Properties</a></li>
                        <li><a href="{{route('admin.author_users')}}">Authorized Users</a></li>
                        <li><a href="{{route('admin.dispatchers')}}">Dispatchers</a></li>
                    @else
                        <li><a href="{{route('dispatcher.properties')}}">Properties</a></li>
                        <li><a href="{{route('dispatcher.author_users')}}">Authorized Users</a></li>
                    @endif
                    
                </ul>
            </nav>
        </div>
    </div>
</div>