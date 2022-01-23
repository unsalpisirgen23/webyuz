<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;


class Menu
{

    private static $htmlMenuItems = "";

    public static function getMenuItems($menus = [])
    {
        if (count($menus) > 0) {
            foreach ($menus as $item) {
                self::$htmlMenuItems .= '<li class="dd-item item_updated " '.(isset($menu->id ) ? 'data-type="links"' : "").'  data-title="' . $item->title . '" data-link="' . $item->link . '"><div class="menu-header">
<strong class="menuItemTitle">' . $item->title . '</strong><div class="buttons"><a href="" class="btn-danger delete"><i class="fas fa-trash-alt"></i></a>
'.(isset($menu->id ) ? '<a href="" class="btn-warning edit"><i class="fas fa-edit"></i></a>' : "" ).'
<a href="" class="btn-primary handle">
<i class="fas fa-arrows-alt"></i></a></div></div>
<div class="content"><input type="text" name="title[]" class="form-control menuItemFromTitle " value="' . $item->title . '">
<input type="text" name="link[]" class="form-control menuItemFromLink " value="' . $item->link . '"></div>
<ul class="menuList">';
                if (isset($item->children)) {
                    self::getMenuItems($item->children);
                }
                self::$htmlMenuItems  .= '</ul></li>';
            }
            return   self::$htmlMenuItems;
        } else {
            return false;
        }
    }

}