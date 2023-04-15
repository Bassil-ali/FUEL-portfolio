<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    public string $name   = null,
    public string $type   = 'text',
    public string $value  = null,
    public string $md     = '2',

    public function __construct(
        $name,
        $type,
        $value,
        $md,
    ){
        $this->name  = $name;
        $this->type  = $type;
        $this->value = $value;
        $this->md    = $md;
    }

    public function render(): View|Closure|string
    {
        return view('components.input.text');

    }//end of render

}//end of class