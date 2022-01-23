<?php

function teams_route($path, $data = [])
{
    return route("modules.teams." . $path, $data);
}

function teams_go_route($path, $data = [])
{
    return redirect()->route("modules.teams." . $path, $data);
}


function teams_view($path, $data = [])
{
    return view("teams::" . $path, $data);
}


function admin_teams_menu_bar_function()
{
    admin_sidebar_menu("Ekibimiz", "fas fa-users", [
        [
            'link' => route("modules.teams.create"),
            'title' => "Ekip Ekle"
        ],
        [
            'link' => route("modules.teams.index"),
            'title' => "Ekip Listele"
        ],
    ]);
}


adminHook()->addAction("admin_menu_bar", "admin_teams_menu_bar_function", 32);






