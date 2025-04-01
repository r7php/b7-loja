<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hero extends Component
{
    /**
     * Create a new component instance.
     */
    public $states;
    public $categorires;
    public function __construct()
    {
        $this->states =[
            ['values'=>'AC','name'=>'ACRE'],
            ['values'=>'SP','name'=>'SÃO PAULO'],
            ['values'=>'RG','name'=>'RIO']

        ];


        $this->categorires =[
            ['values'=>'categoria1','name'=>'categoria 1'],
            ['values'=>'categoria2','name'=>'categoria 2']
        ];

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //$data['state'] = $this->state;
        return view('components.hero');
    }
}
