<?php

function admin_menu_bar()
{

    admin_sidebar_menu("Galeri","fas fa-camera-retro",[
        [
            'link'=>route("modules.gallery.create"),
            'title'=>"Resim Ekle"
        ],
        [
            'link' => route("modules.gallery.index"),
            'title' => "Galeri Listele"
        ],
        [
            'link' => route("modules.gallery.galleryCategories.create"),
            'title' => "Kategori Ekle"
        ],
        [
            'link' => route("modules.gallery.galleryCategories.index"),
            'title' => "Kategori Listele"
        ]
    ]);
}

adminHook()->addAction("admin_menu_bar","admin_menu_bar",64);








