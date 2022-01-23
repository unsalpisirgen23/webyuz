<?php

namespace App\System\Components;

use Illuminate\Support\Facades\DB;

class ClientsSection extends BaseComponent
{

    public function render($args = [])
    {


        return $this->view("contents.clients-section",['args'=>$args])->render();
    }

}