<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Metas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $subtitle;

    public function __construct($subtitle)
    {
      $this->subtitle  = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.metas');
    }
}
