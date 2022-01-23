<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class BaseCard extends Component
{

    public $title;
    public $lg;
    public $md;
    public $sm;
    public $class;

   abstract  public function main();

    public function __construct($title="",$lg= 4,$md = 4,$sm = 12,$class="")
    {
        $this->lg = $lg;
        $this->md = $md;
        $this->sm = $sm;
        $this->class = $class;

        $this->title = $title;
    }

    public function render()
    {
        return view('admin.components.base-card');
    }

}
