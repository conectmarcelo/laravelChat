<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatLst extends Component
{   
    public $mensagens;

    protected $listeners = ["mensagemRecebida"];


    public function mount()
    {
        $this->mensagens = [];
        
    }


    public function mensagemRecebida($mensagem)
    {
        $this->mensagens[] = $mensagem;
    }

    public function render()
    {
        return view('livewire.chat-lst');
    }
}
