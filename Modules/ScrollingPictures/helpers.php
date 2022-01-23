<?php

function admin_ScrollingPictures_menu_bar()
{

    admin_sidebar_menu("Kayan Resimler","far fa-images",[
        [
            'link'=>route("modules.scrollingPictures.create"),
            'title'=>"Resim Ekle"
        ],
        [
            'link'=>route("modules.scrollingPictures.index"),
            'title'=>"Resimleri Listele"
        ],
    ]);


}

adminHook()->addAction("admin_menu_bar","admin_ScrollingPictures_menu_bar",32);








