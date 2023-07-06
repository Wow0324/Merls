<div style="display:none">
    <div id="choose-property" class="popup menu" style="width: 500px; max-width: 100%;">
        <div class="inner bcwhite">
            <h3 class="fs18 white bcblack pt10 pb10 pl20 pr20 mb30">Choose Property</h3>
            <nav class="main-menu">
                <ul>
                    @foreach ($properties as $property)
                        @if ($user->role == 0)
                            <li><a href="{{route('admin.properties', ['property_id' => $property->id])}}">{{$property->name}}</a></li>
                        @elseif ($user->role == 1)
                            <li><a href="{{route('customer.dashboard', ['property_id' => $property->id])}}">{{$property->name}}</a></li>
                        @else
                            <li><a href="{{route('dispatcher.properties', ['property_id' => $property->id])}}">{{$property->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>