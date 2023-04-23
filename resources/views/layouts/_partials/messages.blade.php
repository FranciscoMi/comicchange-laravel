<!--
Classes de mensajes (success, failed, danger)
-->
@if($message = Session::get('success'))
    <div class="text-cite menu--header">
        <p>{{$message}}</p>
    </div>
@endif

@if($message = Session::get('failed'))
    <div class="text-cite menu--header color--red">
        <p>{{$message}}</p>
    </div>
@endif
