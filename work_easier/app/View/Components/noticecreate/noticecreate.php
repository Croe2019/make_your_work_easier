<?php

namespace App\View\Components\noticecreate;

use Illuminate\View\Component;

class noticecreate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.noticecreate.noticecreate');
    }
}
