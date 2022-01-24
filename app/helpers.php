<?php

use App\Helpers\Template;
use App\Helpers\UserRoleSelect;
use App\System\Libraries\Deneme;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;

function base_url(){
    return env("APP_URL");
}

function import($path, $data = [])
{
    $html = view($path, $data)->render();
    return $html;
}



function get_asset($value = '')
{
    return App\Helpers\Template::assets($value);
}

function get_public_assets($value)
{
   return "/assets/".$value;
}


function get_template($id = "")
{
    $templaate = DB::table("templates")->get();
            if ($templaate->count() > 0)
            {
                foreach ($templaate as $temp)
                {
                    echo '<option  '.($id == $temp->id ? "selected" : null).' value="'.$temp->id.'">'.$temp->name.'</option>';
                }
            }
}


function get_nav_menu($menu_link)
{
    $menu = get_site_database()->table("menus")
        ->where("status", "=", 1)
        ->where('menu_link', "=", $menu_link)
        ->first();
    if ($menu)
        return json_decode($menu->content);
}


function addColum($tabloName, $type, $columnName)
{
    $sql = "ALTER TABLE $tabloName 
ADD COLUMN $columnName $type  NULL;";
}

function addAction($to, $function, $priority = 2)
{
    \App\Helpers\Hooks::install()->addAction($to, $function, $priority);
}

function removeAction($to, $function)
{
    \App\Helpers\Hooks::install()->removeAction($to, $function);
}

function doAction($to, $args = [])
{
    return \App\Helpers\Hooks::install()->doAction($to, $args);
}



function admin_sidebar_menu($title, $icon = "", $subMenu = [])
{
    echo '<li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="' . $icon . '"></i><span>' . $title . '</span></a>
                <ul class="dropdown-menu">';

    foreach ($subMenu as $menu) {
        echo '<li><a class="nav-link" href="' . $menu["link"] . '">' . $menu["title"] . '</a></li>';
    }

    echo '</ul>
            </li>';
}




function get_head()
{
    $params = Request::segments();
    if (count($params) < 1) {
        $params[0] = "/";
    }
    for ($i = 0; $i < count($params); $i++) {

        if ($params[0] == null || $params[0] == "/") {
            echo '<title>'.config("settings.site_title").'</title>';
            echo '<meta property="og:site_name" content="'.config("settings.site_title").'">';
            echo '<meta name="description" content="'.config("settings.site_description").'">';
            echo '<meta property="og:description" content="'.config("settings.site_description").'">';
        } elseif ($params[0] == "sayfa") {
            if (Schema::hasTable("pages"))
            {
                $name = "";
                if (array_key_exists(1,$params))
                {
                    $name = $params[1];
                }
                $page = \Illuminate\Support\Facades\DB::table("pages")->where("link","=",$name)->first();
                if ($page){
                    echo '<title>'.config("settings.site_title").' - '.$page->title.'</title>';
                    echo '<meta property="og:url" content="'.config("settings.site_url").'/sayfa/'.$page->link.'">';
                    echo '<title>'.config("settings.site_title").' - '.$name.'</title>';
                }else{
                    echo '<title>'.config("settings.site_title").' - '.$name.'</title>';
                }
                echo '<meta property="og:site_name" content="'.config("settings.site_title").'">';
                echo '<meta name="description" content="'.config("settings.site_description").'">';
                echo '<meta property="og:type" content="Page">';
                echo '<meta property="og:description" content="'.config("settings.site_description").'">';
            }
            return;
        }elseif ($params[0] == "blog") {
            if (Schema::hasTable("posts"))
            {
                $name = "";
                if (array_key_exists(1,$params))
                {
                    $name = $params[1];
                }
                $post = \Illuminate\Support\Facades\DB::table("posts")->where("link","=",$name)->first();
                if ($post){
                    echo '<title>'.config("settings.site_title").' - '.$post->title.'</title>';
                    echo '<meta property="og:url" content="'.config("settings.site_url").'/sayfa/'.$post->link.'">';
                    echo '<meta property="og:description" content="'.$post->description.'">';
                    echo '<meta property="description" content="'.$post->description.'">';
                }else{
                    echo '<title>'.config("settings.site_title").' - '.$name.'</title>';
                }
                echo '<meta property="og:site_name" content="'.config("settings.site_title").'">';
                echo '<meta property="og:type" content="Blog">';
            }
            return;
        }
    }
}



function admin_curl(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://webyuz.test/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $sonuc = curl_exec($ch);
    curl_close($ch);
    return $sonuc;
}


function addColumn($tableName,$columnName,$columnDataType)
{
    return "ALTER TABLE $tableName ADD $columnName $columnDataType;";
}



function setWidget($widget_key)
{
    if (Schema::hasTable("widget_table")){
       $rows = \Illuminate\Support\Facades\DB::table("widget_table")->where("widget_key","=",$widget_key)->get()->count();
        if ($rows < 1)
        {
            \Illuminate\Support\Facades\DB::table("widget_table")->insert(['widget_key'=>$widget_key]);
        }
    }
}

function getWidget($widget_key){
    if (Schema::hasTable("widget_table")){
        $rows = \Illuminate\Support\Facades\DB::table("widget_table")->where("widget_key","=",$widget_key)->get()->count();
        if ($rows > 0)
        {
            \Illuminate\Support\Facades\DB::table("widget_table")->where('widget_key',"=",$widget_key)->first();
        }
    }
}

function getWidgetFirst($widget_key){
    if (Schema::hasTable("widget_table")){
        $rows = \Illuminate\Support\Facades\DB::table("widget_table")->where("widget_key","=",$widget_key)->get()->count();
        if ($rows > 0)
        {
          return  \Illuminate\Support\Facades\DB::table("widget_table")->where('widget_key',"=",$widget_key)->get();
        }
    }
}


function getWidgetAll(){
    if (Schema::hasTable("widget_table")){
        $rows = \Illuminate\Support\Facades\DB::table("widget_table")->get()->count();
        if ($rows > 0)
        {
          return  \Illuminate\Support\Facades\DB::table("widget_table")->get();
        }
    }
}



function setWidgetValue($widget_key,$widget_value)
{
    if (Schema::hasTable("widget_table")){
        $rows = \Illuminate\Support\Facades\DB::table("widget_table")->where("widget_key","=",$widget_key)->get()->count();
        if ($rows > 0)
        {
            \Illuminate\Support\Facades\DB::table("widget_table")->where('widget_key',"=",$widget_key)->update(['widget_value'=>$widget_value]);
        }
    }
}


function addWidgetColumn($widget_key,$columnName,$columnDataType)
{
    if (Schema::hasTable("widget_table")){
        $rows = \Illuminate\Support\Facades\DB::table("widget_table")->where("widget_key","=",$widget_key)->get()->count();
        if ($rows > 0)
        {
            if (!Schema::hasColumn("widget_table","widget_table")){
                \Illuminate\Support\Facades\DB::select(addColumn("widget_table",$columnName,$columnDataType));
            }
        }
    }
}

function dbname(){
   return DB::connection('user_database');
}





































function getHeaderNavbarMenu2($menus = [],$path = "")
{
    $rows = 0;
    if (count($menus) > 0) {
        foreach ($menus as $menu) {
            if (file_exists(base_path("resources/views/templates/".\App\Helpers\Template::isActive()."/$path.php"))){

                require base_path("resources/views/templates/".\App\Helpers\Template::isActive()."/$path.php");
            }
            $rows++;
        }
    }

}
addAction('get_header_nav_menu','get_header_nav_menu_function');


    function get_header_nav_menu_function($menus = [])
    {
        $i = 0;
        if (count($menus) > 0) {
            foreach ($menus as $menu) {
                echo '<li ' . (isset($menu->children) ? 'class="dropdown"' : null) . '  >';
                echo '<a class="' . (isset($menu->children) ? 'nav-link scrollto' : null) . ' ' . ($i == 0 ? "active" : null) . '" href="' . $menu->link . '">';
                echo(isset($menu->children) ? '<span>' . $menu->title . '</span> <i class="bi bi-chevron-down"></i>' : $menu->title);
                echo '</a>';

                if (isset($menu->children)) {
                    echo '<ul>';
                    get_header_nav_menu_function($menu->children);
                    echo '</ul>';
                }
                echo '</li>';
                $i++;
            }
        }
    }



addAction('get_header_nav_menu', 'get_header_nav_menu_function');

function get_posts_function($params = [])
{
    if (__DIR__ . "post_list_comp.blade.php") {
        if (Schema::hasTable("posts")) {
            if (isset($params["link"])) {
                $posts = DB::table("posts")->where("link", "like", "%" . $params["link"] . "%")->where("status", "=", 1)->get();
            } else {
                $posts = DB::table("posts")->where("status", "=", 1)->get();
            }
            $view = \App\Helpers\Template::renderView("post_list_comp", ['posts' => $posts]);
            return $view;
        }
    }
}

addAction("get_posts", "get_posts_function", 55);


function get_categories_function()
{
    if (__DIR__ . "categories_comp.blade.php") {
        if (Schema::hasTable("categories")) {


            $categories = DB::table("categories")->where("status", "=", 1)->get();

            $view = \App\Helpers\Template::renderView("categories_comp", ['categories' => $categories]);
            return $view;
        }
    }
}

addAction("get_categories", "get_categories_function", 56);


function get_hero_function($attributes = [])
{
        if (Schema::hasTable("sliders")) {

            $sliders = DB::table("sliders")->where("status", "=", 1)->get();
            if ($sliders->count() > 0) {
                $view = view("template_components.headers.hero",['attributes'=>$attributes]);
                if ($view)
                return $view;
            }
        }
}

addAction("get_hero", "get_hero_function", 57);

// echo  doAction("get_hero",['style'=>"margin:150px;"]);

/**
 * @return string|void
 * Bu Alana Dikkat Pagination Eklentisi Kurulmadığı İçin boş Dönderiliyor
 */
function get_pagination_function()
{
    if (__DIR__ . "pagination.blade.php") {
        $view = \App\Helpers\Template::renderView("pagination_comp");
        return $view;

    }
}

addAction("get_pagination", "get_pagination_function", 58);

function get_search_function()
{
    if (__DIR__ . "search_comp.blade.php") {

        $view = \App\Helpers\Template::renderView("search_comp");
        return $view;


    }
}

addAction("get_search", "get_search_function", 59);


function get_about_section_function()
{
    if (__DIR__ . "about_section_comp.blade.php") {
        $section = DB::table('sections')->where('section_name','=','about_section')->get();

        $view = \App\Helpers\Template::renderView("about_section_comp",['section'=>$section]);
        return $view;


    }
}

addAction("get_about_section_comp", "get_about_section_function", 60);

function get_services_section_function()
{
    if (__DIR__ . "services_section_comp.blade.php") {
        $section = DB::table('sections')->where('section_name','=','services_section')->get();
        /**
         * servisler diye modül oluşturulacak bu modül veri tabanında services diye bir tablo oluşturacak.
         * buraya onunda sorgusu yapılacak ve içerik dönderilecek. şu anda pasif durumdadır. bu özelliiğ tamamlayınca if içnde kontrol edilip gönderilecek
         */
        if ($section->count() > 0 ){
            $view = \App\Helpers\Template::renderView("services_section_comp",['section'=>$section]);
            return $view;
        }



    }
}

addAction("get_services_section_comp", "get_services_section_function", 61);


function get_gallery_section_function()
{
    if (Schema::hasTable("gallery_categories") && Schema::hasTable("galleries")) {


        $galleries = DB::table("galleries")->get();
        $categories = DB::table("gallery_categories")->get();
        if ($galleries->count() > 0 && $categories->count() > 0) {
            return \App\Helpers\Template::renderView('gallery_section_comp', ['galleries' => $galleries, 'categories' => $categories]);
        }
    }
}

addAction("get_gallery_section_comp", "get_gallery_section_function", 62);


function get_scrolling_pictures_section_function()
{
    if (Schema::hasTable("scrolling_pictures")) {


        $scrollingPictures = DB::table("galleries")->get();

        if ($scrollingPictures->count() > 0) {
            return \App\Helpers\Template::renderView('scrolling_pictures_section_comp', ['scrollingPictures' => $scrollingPictures]);
        }
    }
}

addAction("get_scrolling_pictures_section_comp", "get_scrolling_pictures_section_function", 63);






function get_testimonials_section_function()
{
    if (Schema::hasTable("testimonials")) {


        $testimonials = DB::table("testimonials")->get();
        $section = DB::table('sections')->where('section_name','=','cta_section')->get();

        if ($testimonials->count() > 0 && $section->count() > 0) {
            return \App\Helpers\Template::renderView('testimonials_section_comp', ['testimonials' => $testimonials,'section'=>$section]);
        }
    }
}
addAction("get_testimonials_section_comp", "get_testimonials_section_function", 64);




function get_cta_section_function()
{
    if (__DIR__ . "cta_section_comp.blade.php") {
        $section = DB::table('sections')->where('section_name','=','cta_section')->get();
        if (count($section) > 0) {
            $view = \App\Helpers\Template::renderView("cta_section_comp", ['section' => $section]);
            return $view;
        }
    }
}

addAction("get_cta_section_comp", "get_cta_section_function", 65);


function get_style_section_function()
{
    $styles = doAction("widget_style_tag",['href'=>get_public_assets("img/favicon.png"),'rel'=>"icon"]);
    $styles .= '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">';
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("img/favicon.png"),'rel'=>"apple-touch-icon"]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("img/apple-touch-icon.png")]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("vendor/animate.css/animate.min.css")]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("vendor/aos/aos.css")]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("vendor/bootstrap/css/bootstrap.min.css")]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("vendor/bootstrap-icons/bootstrap-icons.css")]);
    $styles .= '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">';
    $styles .= '<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>';
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("vendor/glightbox/css/glightbox.min.css")]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("vendor/swiper/swiper-bundle.min.css")]);
    $styles .= doAction("widget_style_tag",['href'=>get_public_assets("css/style.css")]);
    return $styles;
}

addAction("get_style_section","get_style_section_function");

function get_script_section_function()
{
    $scripts  = doAction("widget_script_tag",['src'=>get_public_assets("vendor/aos/aos.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("vendor/bootstrap/js/bootstrap.bundle.min.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("vendor/glightbox/js/glightbox.min.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("vendor/isotope-layout/isotope.pkgd.min.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("vendor/php-email-form/validate.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("vendor/swiper/swiper-bundle.min.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("vendor/waypoints/noframework.waypoints.js")]);
    $scripts .= doAction("widget_script_tag",['src'=>get_public_assets("js/main.js")]);
    return $scripts;
}

addAction("get_script_section","get_script_section_function");

function adminHook()
{
    return \App\System\Kernel\AdminHook::install();
}

function templateHook()
{
    return \App\System\Kernel\TemplateHook::install();
}


function style_function($args = [])
{
   $asset = DB::table("template_styles")->where("template_id","=",21)->first();
   if (isset($asset->content))
   {
       return $asset->content;
   }
}


function script_function()
{

}


templateHook()->addAction("header_top_bar",\App\System\Components\HeaderTopBar::class);
templateHook()->addAction("header_navbar",\App\System\Components\Navbar::class);
templateHook()->addAction("hero_section",\App\System\Components\HeroSection::class);
templateHook()->addAction("cta_section",\App\System\Components\CtaSection::class);
templateHook()->addAction("services_section",\App\System\Components\ServicesSection::class);
templateHook()->addAction("portfolio_section",\App\System\Components\PortfolioSection::class);
templateHook()->addAction("clients-section",\App\System\Components\ClientsSection::class);
templateHook()->addAction("others_up_button",\App\System\Components\UpButton::class);
templateHook()->addAction("footer",\App\System\Components\Footer::class);
templateHook()->addAction("about-page",\App\System\Components\AboutPage::class);
templateHook()->addAction("our-team",\App\System\Components\OurTeam::class);
templateHook()->addAction("features",\App\System\Components\Features::class);
templateHook()->addAction("testimonials-list",\App\System\Components\TestimonialsList::class);
templateHook()->addAction("contact",\App\System\Components\Contact::class);





addAction("custom_style","style_function");

addAction("custom_script","script_function");





















function userRoleSelect($id,$user_id)
{
   return UserRoleSelect::get($id,$user_id);
}



function widget_style_function($params){
    return '<link href="'.(isset($params['href']) ? $params['href'] :"").'" rel="'.(isset($params['rel']) ? $params['rel'] :"stylesheet" ).'">';
}

addAction("widget_style_tag","widget_style_function");

function widget_script_function($params){
    return '<script src="'.(isset($params["src"]) ? $params["src"] : null).'"></script>';
}

addAction("widget_script_tag","widget_script_function");


function home_categories_widget()
{
    $categories = \Illuminate\Support\Facades\DB::table("categories")->where("status","=","1")->limit(4)->get();
    if ($categories){
        $view =  \App\Helpers\Template::renderView("home_categories",["categories"=>$categories]);
        return $view;
    }
}


addAction("home_categories_widget","home_categories_widget");




function get_template_widget_group_function($params = ['action_order'=>""])
{
        $domain = request()->getHost();
        $templateHooksComponentWidgets = DB::table("template_hooks_component_widgets")
            ->join('component_widgets', 'component_widgets.id', '=', 'template_hooks_component_widgets.component_widget_id')
            ->join('template_hooks', 'template_hooks.id', '=', 'template_hooks_component_widgets.template_hooks_id')
            ->join("templates","templates.id","=","template_hooks_component_widgets.template_id")
            ->join("sites","sites.template_id","=","templates.id")
            ->where('template_hooks.action_group',"=",$params['action_group'])
            ->where("sites.domain","=",$domain)
            ->get(['template_hooks_component_widgets.id as thcw_id',
                'template_hooks_component_widgets.*',
                'component_widgets.component_name as component_name',
                'template_hooks.action_title as action_title',
                'template_hooks.action_group as action_group'
            ]);
        foreach ($templateHooksComponentWidgets as $widget) {
            echo templateHook()->doAction($widget->component_name,$widget);
        }
}

templateHook()->addAction("get_template_widget_group","get_template_widget_group_function");


function get_site_database()
{
    $domain = request()->getHost();
    $site = DB::table("sites")->where("sites.domain","=",$domain)->first();
    if ($site){
        if (isset($site->database_name))
        {
            config()->set("database.connections.user_database.database",$site->database_name);
            return  DB::connection("user_database");
        }
    }
}

function get_site_database_schema()
{
    $domain = request()->getHost();
    $site = DB::table("sites")->where("sites.domain","=",$domain)->first();
    if ($site){
        config()->set("database.connections.user_database.database",$site->database_name);
       return  Schema::connection("user_database");
    }
}



function permission($name,$domain)
{
         return  \App\System\Kernel\Permission::getInstance()
             ->is($name,$domain);
}



function randStr($n) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}



function randNum($n) {
    $characters = '0123456789';
    $randomNum = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomNum .= $characters[$index];
    }

    return $randomNum;
}


function user_data($id){
    if(isset($id)) {

        $users = DB::table('users')->where('id', '=', $id)->first();

        return $users->name;
    }

}

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


function admin_faqs_menu_bar()
{
//
    admin_sidebar_menu("S.S.S.","far fa-question-circle",[
        [
            'link'=> route("admin.faqs.create"),
            'title'=>"SSS Ekle",
        ],
        [
            'link'=>route("admin.faqs.index"),
            'title'=>"SSS Listele",
        ],
    ]);
return "";
}



adminHook()->addAction("admin_menu_bar","admin_faqs_menu_bar",64);



function services_route($path, $data = [])
{
    return route("admin.servicesTable." . $path, $data);
}

function services_go_route($path, $data = [])
{
    return redirect()->route("admin.servicesTable." . $path, $data);
}


function services_view($path, $data = [])
{
    return view("admin.servicesTable." . $path, $data);
}


function admin_services_menu_bar_function()
{
    admin_sidebar_menu("Hizmetler", "fas fa-cube", [
        [
            'link' => route("admin.servicesTable.create"),
            'title' => "Bileşen Ekle"
        ],
        [
            'link' => services_route("index"),
            'title' => "Bileşen Listele"
        ],
    ]);
}


adminHook()->addAction("admin_menu_bar", "admin_services_menu_bar_function", 32);




function teams_route($path, $data = [])
{
    return route("admin.teams." . $path, $data);
}

function teams_go_route($path, $data = [])
{
    return redirect()->route("admin.teams." . $path, $data);
}


function teams_view($path, $data = [])
{
    return view("admin.teams." . $path, $data);
}


function admin_teams_menu_bar_function()
{
    admin_sidebar_menu("Ekibimiz", "fas fa-users", [
        [
            'link' => route("admin.teams.create"),
            'title' => "Ekip Ekle"
        ],
        [
            'link' => route("admin.teams.index"),
            'title' => "Ekip Listele"
        ],
    ]);
}


adminHook()->addAction("admin_menu_bar", "admin_teams_menu_bar_function", 32);


