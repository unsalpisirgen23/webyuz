<?php

namespace App\View\Components;


class CreateCard extends BaseCard
{

    public function __construct($title = "", $lg = 4, $md = 4, $sm = 12,$class="")
    {
        parent::__construct($title, $lg, $md, $sm,$class);
    }


    public function render()
    {
        return view('admin.components.create-card');
    }

    public function main()
    {
        // TODO: Implement main() method.
    }
}
