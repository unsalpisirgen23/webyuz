<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Link extends Component
{
    public $href;

    public $route;

    public $params;

    public $class;

    public $id;

    public $onClick;

    public $target;

    public $title;

    public $data = [];

    public function __construct($href = "", $route = "" , $params = "" , $class = "", $id = "", $onClick = "", $target = "", $title = "" ,$data = [])
    {
        $this->href = $href;
        $this->route = $route;
        $this->class = $class;
        $this->id = $id;
        $this->onClick = $onClick;
        $this->target = $target;
        $this->title = $title;
        $this->data = $data;
        $this->params = $params;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.link');
    }
}
