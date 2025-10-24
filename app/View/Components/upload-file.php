<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class upload-file extends Component

{
    /**
     * Create a new component instance.
     */
    public $target;
    public $media;
    public $collum;
    public $type;
    
    public function __construct($target,$collum,$media,$type)
    {
        
        $this->target = $target;
        $this->collum = $collum;
        $this->media = $media;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.upload-file');
    }
}