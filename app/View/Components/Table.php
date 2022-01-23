<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $th=[];
    public $td;
    public $tr;
    public $class;
    public $theadClass;
    public $thClass;
    public $tdClass;
    public $trClass;
    public $thContent=[];
    public $tdContent=[];


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class="",$tr="",$td="",$th=[],$tdClass="",$thClass="",$theadClass="",$trClass="",$thContent=[],$tdContent=[])
    {
        $this->th = $th;
        $this->td = $td;
        $this->tr = $tr;
        $this->class = $class;
        $this->thClass = $thClass;
        $this->tdClass = $tdClass;
        $this->trClass = $trClass;
        $this->theadClass = $theadClass;
        $this->thContent=$thContent;
        $this->tdContent=$tdContent;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.table');
    }
}
