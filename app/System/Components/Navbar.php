<?php

namespace App\System\Components;

use Illuminate\Support\Facades\DB;

class Navbar extends BaseComponent
{

        public function render($args = [])
        {
            $widgetContent = DB::table("component_widget_contents")
                ->where("template_id","=",$args->template_id)
                ->where("component_widget_id","=",$args->component_widget_id)
                ->first();
            if ($widgetContent)
            {
                $item = json_decode($widgetContent->content)[0];
                return $this->view("headers.navbar",['args'=>$args,'item'=>$item])->render();
            }
            return $this->view("headers.navbar",['args'=>$args])->render();
        }

}