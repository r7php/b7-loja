<?php

namespace App\Livewire;

use Livewire\Component;

class Gallery extends Component
{
    public $images;
    public $featureUrl;
    public function render()
    {
        return view('livewire.gallery');
    }


    public function mount($images) // recebe o valor passado do Blade
    {   $this->images = $images;
        $this->featureUrl = $images->where('featured',true)->first()->url ?? 'https://placehold.it/500x500';
        //dd($this->$images);

    }
    public function featured(String $url){
        $this->featureUrl = $url;
    }
}
