<?php

function admin_contact_menu_bar()
{
    admin_sidebar_menu("İletişim Formu","fas fa-envelope",[
        [
            'link'=>route("modules.contact.index"),
            'title'=>"Mesajlar"
        ],

    ]);
}

adminHook()->addAction("admin_menu_bar","admin_contact_menu_bar",44);

