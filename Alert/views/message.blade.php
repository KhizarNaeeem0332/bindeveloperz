@foreach(session('bindeveloperz_alert'  , collect())->toArray() as $alert  )
    <div class="alert {{($alert['rounded']) ? "round" : ""}} alert-{{$alert['type']}} {{$alert['autoClose'] ? "itech_alert" : ""}}  ">
        @if($alert['close']) <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>@endif
        @if($alert['boxed'])
            <h3 class="text-{{$alert['type']}}">{{$alert['title']}}</h3><hr>
        @endif
        @if(is_array($alert['message']))
            <ul class="m-0 p-0" style="list-style: none;">
                @foreach($alert['message'] as $message)
                     @if(is_array($message))
                        @foreach($message as $msg)
                           <li>{!! $msg !!}</li>
                        @endforeach
                    @else
                        <li>{!! $message !!}</li>
                    @endif
                @endforeach
            </ul>
        @else
           {!! $alert['message'] !!}
        @endif
    </div>
@endforeach
{{ session()->forget('bindeveloperz_alert') }}