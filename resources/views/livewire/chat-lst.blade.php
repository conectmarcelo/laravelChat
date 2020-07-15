<div>
   
   <h5 class="mt-3"><strong>Lista de Mensagens</strong></h5>

   
   @foreach($mensagens as $mensagem)
   
        <li>{{$mensagem['usuario']}} - {{$mensagem['mensagem']}}</li>

   @endforeach



   <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('cbb366231d21419138d9', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('chat-channel');
    channel.bind('chat-event', function(data) {
      //alert(JSON.stringify(data));
      window.livewire.emit('mensagemRecebida', data)
    });
  </script>

</div>
