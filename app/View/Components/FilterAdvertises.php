<?php

namespace App\View\Components;

use App\Models\Advertise;
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
        $this->advertiseList = Advertise::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-advertises');
    }
}
