<?php

namespace App\View\Components;


class CreateInput extends BaseFormElement
{
    public function __construct($type="text",$name= "",$class ="form-control",$id ="",$title="")
    {
        parent::__construct($type,$name,$class,$id,$title);
    }


    public function render()
    {
        return view('admin.components.base-form-element');
    }

    public function main()
    {
        // TODO: Implement main() method.
    }
}
