<?php

function admin_faqs_menu_bar()
{
//
    admin_sidebar_menu("S.S.S.","far fa-question-circle",[
        [
            'link'=> route("modules.faqs.create"),
            'title'=>"SSS Ekle",
        ],
        [
            'link'=>route("modules.faqs.index"),
            'title'=>"SSS Listele",
        ],
    ]);
return "";
}



adminHook()->addAction("admin_menu_bar","admin_faqs_menu_bar",64);








