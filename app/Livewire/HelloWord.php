<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWord extends Component
{
    public $name = 'jhonatha';

    public $op= ['tipo1 ', 'tipo2'];


    public function render(){
        return view('livewire.hello-word');
    }
}
