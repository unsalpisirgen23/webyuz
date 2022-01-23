<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;

class TemplateWidget
{
    private static $instance;
    private $Widgets = [];

    public function doWidget($action_group)
    {
        if (Schema::hasTable("template_widgets")){
            $templateWidgets = \Illuminate\Support\Facades\DB::table("template_widgets")
                ->where('action_status',"=",1)
                ->where("action_group","=",$action_group)
                ->orderBy("action_order")
                ->get()
            ;
            if ($templateWidgets->count() > 0){
                foreach ($templateWidgets as $templateWidget)
                {
                    if (!isset($this->Widgets[$templateWidget->action_to]))
                    {
                      //  $this->Widgets[$templateWidget->action_to];
                    }
                    @$this->Widgets[$action_group][$templateWidget->action_to][$templateWidget->action_from] = $templateWidget->action_order;
                }
            }
        }
    }






















    public static function install():self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return  self::$instance;
    }

}