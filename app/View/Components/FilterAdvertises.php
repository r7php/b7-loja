<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterAdvertises extends Component
{
    /**
     * Create a new component instance.
     */
    public $advertiseList;

    public function __construct()
    {
        //
        $this->advertiseList = [
            [
                'image'=>'http://placehold.it/150x150',
                'title'=>'tenis',
                'price'=>"5.00",
                'href'=>"#"
            ],


            [
                'image'=>'http://placehold.it/150x150',
                'title'=>'tenis 2',
                'price'=>"1.00",
                'href'=>"#"
            ],


            [
                'image'=>'http://placehold.it/150x150',
                'title'=>'tenis 3',
                'price'=>"3.00",
                'href'=>"#"
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-advertises');
    }
}
