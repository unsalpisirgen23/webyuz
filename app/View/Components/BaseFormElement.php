<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class BaseFormElement extends Component
{
    public $type;
    public $name;
    public $class;
    public $id;
    public $title;

    public $slot;

    abstract  public function main();

    public function __construct($type="text",$name= "",$class ="form-control",$id ="",$title = "",$slot="")
    {

        $this->type = $type;
        $this->name = $name;
        $this->class = $class;
        $this->id = $id;
        $this->title = $title;

        $this->slot= $slot;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base-form-element');
    }
}
