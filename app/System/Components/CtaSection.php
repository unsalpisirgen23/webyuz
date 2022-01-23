<?php

namespace App\System\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CtaSection extends BaseComponent
{

    public function render($args = [])
    {


        if (Schema::hasTable("component_widget_contents")){

            $widgetContent = DB::table("component_widget_contents")
                ->where("template_id","=",$args->template_id)
                ->where("component_widget_id","=",$args->component_widget_id)
                ->first();
            if ($widgetContent)
            {
                $asset = json_decode($widgetContent->content)[0];
                return $this->view("contents.cta-section",['args'=>$args,'asset'=>$asset])->render();
            }
        }
        return $this->view("contents.cta-section",['args'=>$args])->render();
    }



}