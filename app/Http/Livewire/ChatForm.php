<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Validator;

class ChatForm extends Component
{
    public $nombre;
    public $mensagem;

    public function mount()
    {
        $this->nombre ="";
        $this->mensagem ="";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            "nombre" => "required|min:3",
            "mensagem" => "required"
        ]);
    }

    public function enviarMensagem()
    {
        $this->validate([
            "nombre" => "required|min:3",
            "mensagem" => "required"

        ]);
        
        $this->emit("mensagemEnviada");

        $dados = ["usuario" => $this->nombre,
            "mensagem" => $this->mensagem
        ];

        //$this->emit("mensagemRecebida",$dados);

        event(new \App\Events\EnviarMensagem($this->nombre, $this->mensagem));

    }

}
