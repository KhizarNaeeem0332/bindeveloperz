<script>
 $(document).ready(function () {

     @foreach(session('bindeveloperz_toast'  , collect())->toArray() as $alert  )

             toastr.options.closeButton = {{$alert['close']}}
             toastr.options.progressBar = {{$alert['progress']}}
             toastr.options.positionClass = '{{$alert['position']}}'

             @if($alert['persist'])
                toastr.options.timeOut = 0;
                toastr.options.extendedTimeOut = 0;
             @else
                 toastr.options.timeOut = '{{"3000"}}';
                 toastr.options.extendedTimeOut = '{{"3000"}}';
             @endif

             @if($alert['title'] == '')
                 toastr.{{$alert['type']}}('{{$alert['message']}}');
            @else
                 toastr.{{$alert['type']}}('{{$alert['message']}}' , '{{$alert['title']}}');
            @endif

     @endforeach
  });
</script>

{{ session()->forget('bindeveloperz_toast') }}