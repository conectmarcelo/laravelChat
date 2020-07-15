<div>

    <div style="position: absolute; margin-top:180px; margin-left:180px"

         class="alert alert-success collapse"
         role="alert" 
         id="avisoSuccess">mensagem enviada
    </div>

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" wire:model="nombre" >
        @error("nombre") 
            <small class="text-danger">{{ $message }}</small> 
        @else 
            <small class="text-muted">Nome: {{$nombre}}</small> 
        @enderror
    </div>

    <div class="form-group">
        <label for="mensagem"><strong>Mensagem</strong></label>
        <input type="text" class="form-control" id="mensagem" wire:model="mensagem" wire:keydown.enter="enviarMensagem">
        @error("mensagem") 
            <small class="text-danger">{{ $message }}</small> 
        @else 
            <small class="text-muted">Digite sua mensagem e tecle <code>ENTER</code> para enviar</small> 
        @enderror
    </div>

    <!--button class="btn btn-primary" wire:click="enviarMensagem">Enviar mensagem</button-->

    <div wire:offline class="alert alert-danger text-center">
        <strong>Sem conexão com a internet</strong>
    </div>
    
    <div class="row">
        <div class="col-6">
            <!-- Mensajes de alerta -->    
            <div style="position: absolute;"
            class="alert alert-success collapse" 
            role="alert" 
            id="avisoSuccess"       
            >Se ha enviado</div>        
        </div>    
        <div class="col-6 pt-2 text-right">
            <button 
                class="btn btn-primary" 
                wire:click="enviarMensagem"
                wire:loading.attr="disabled"
                wire:offline.attr="disabled"            
            >Enviar Mensagem</button>
        </div>        
    </div>


    <!--script>
    window.livewire.on('mensagemEnviada', function(){
        $("#avisoSuccess").fadeIn("slow");
        setTimeout(function() { $("#avisoSuccess").fadeOut("slow"); }, 3000);
    });
    </script-->
    

    <script>
                 
        // Esto lo recibimos en JS cuando lo emite el componente
        // El evento "enviadoOK"
        $( document ).ready(function() {
            window.livewire.on('enviadoOK', function () {
                $("#avisoSuccess").fadeIn("slow");                
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);                                
            });
        });
        
    </script>
</div>
