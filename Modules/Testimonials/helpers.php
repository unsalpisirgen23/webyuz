<?php

function admin_testimonials_menu_bar()
{
    admin_sidebar_menu("Müşteri Yorumları","fas fa-comments",[
        [
            'link'=>route("modules.testimonials.create"),
            'title'=>"Yorum Ekle"
        ],        [
            'link'=>route("modules.testimonials.index"),
            'title'=>"Yorumları Listele"
        ],
    ]);
}

adminHook()->addAction("admin_menu_bar","admin_testimonials_menu_bar",128);

