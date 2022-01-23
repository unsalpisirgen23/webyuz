<?php

function services_route($path, $data = [])
{
    return route("modules.services." . $path, $data);
}

function services_go_route($path, $data = [])
{
    return redirect()->route("modules.services." . $path, $data);
}


function services_view($path, $data = [])
{
    return view("services::" . $path, $data);
}


function admin_services_menu_bar_function()
{
    admin_sidebar_menu("Hizmetler", "fas fa-cube", [
        [
            'link' => route("modules.services.create"),
            'title' => "Bileşen Ekle"
        ],
        [
            'link' => services_route("index"),
            'title' => "Bileşen Listele"
        ],
    ]);
}


adminHook()->addAction("admin_menu_bar", "admin_services_menu_bar_function", 32);






