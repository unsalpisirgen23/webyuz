@extends("admin.layouts.app")
@section("style")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
    integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset("administrator/assets/jquery.nestable.min.css")}}">
<style>
    ul.pag-list {
        display: block;
        list-style-type: none;
        padding: 0px;
    }

    ul.rootMenuList,
    ul.MenuList {
        list-style-type: none;
    }

    ul.rootMenuList li,
    ul.MenuList li {
        display: block;
        border: solid 1px #ddd;
        background: #f7f7f7;
        margin-top: 4px;
        position: relative;
    }

    ul.rootMenuList li .menu-header,
    ul.MenuList li .menu-header {
        display: block;
        background: #fff;
        border-bottom: solid 1px #ddd;
        height: 35px;
        width: 100%;
    }

    ul.rootMenuList li .menu-header strong,
    ul.MenuList li .menu-header strong {
        margin-left: 48px;
        line-height: 35px;
    }

    ul.rootMenuList li .menu-header .buttons,
    ul.MenuList li .menu-header .buttons {
        margin-right: 0px;
        padding: 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        height: 40px;
    }

    ul.rootMenuList li .menu-header .buttons a,
    ul.MenuList li .menu-header .buttons a {
        height: 33px;
        margin-top: 0px;
        width: 40px;
        text-align: center;
        line-height: 33px;
        display: block;
    }

    ul.rootMenuList li .menu-header .buttons>.handle {
        position: absolute;
        left: 0px;
        right: 100%;
    }

    ul.rootMenuList li .menu-header .buttons .delete {
        position: absolute;
        right: 0px;

    }

    ul.rootMenuList li .menu-header .buttons .edit {
        position: absolute;
        right: 41px;
    }

    ul.MenuList li .menu-header .buttons>.handle {
        position: absolute;
        left: 0px;
        right: 100%;
    }

    ul.MenuList li .menu-header .buttons .delete {
        position: absolute;
        right: 0px;
    }

    ul.MenuList li .menu-header .buttons .edit {
        position: absolute;
        right: 41px;
    }

    ul.rootMenuList li .content , ul.MenuList li .content {
        display: none;
    }

    ul.rootMenuList li .menuList {
        background: #eae9e9;
    }

</style>
@endsection
@section("content")
<div id="app">
    <section class="section">
        <div class="section-header">
            <h4>Menü Yönetimi</h4>
            <h6 class="m-3">Yeni Menü Ekle</h6>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-3">
                    <div id="accordion">
                        <div class="card m-0 pt-0">
                            <div class="card-header p-0 m-0" id="headingPages"
                                style="position:relative;min-height: 50px;">
                                <button class="btn btn-warning m-0"
                                    style="position: absolute; width: 100%;border-radius: 0px; font-size:18px;height: 100%;"
                                    data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                                    aria-controls="collapsePages">
                                    Sayfalar
                                </button>
                            </div>
                            <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                                data-parent="#accordion">
                                <div class="card-body pl-3 pr-3 pb-3">
                                    <form action="javascript:void" id="FormPages">
                                        <ul class="pag-list">
                                            @foreach(\App\Models\Page::all()->where("status","=",1) as $page)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" name="menuItem[]"
                                                               class="pages-select-all"
                                                               value='{"link":"/sayfa/{{$page->link}}","title":"{{$page->title}}"}'>
                                                        {{$page->title}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <label class="btn btn-info w-50"
                                            style="float: left;margin-right: 4px;margin-left: -6px;">
                                            <input type="checkbox" style="width: 18px;display: none;"
                                                id="pages-select-all" name="pages-select-all"> Tümünü Seç
                                        </label>
                                        <button class="btn btn-success w-50" style="margin-right: -4px;">Menüye
                                            Ekle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card m-0 pt-0">
                            <div class="card-header p-0 m-0" id="headingCategories"
                                style="position:relative;min-height: 50px;">
                                <button class="btn btn-primary m-0"
                                    style="position: absolute; width: 100%;border-radius: 0px; font-size:18px;height: 100%;"
                                    data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true"
                                    aria-controls="collapseCategories">
                                    Kategoriler
                                </button>
                            </div>
                            <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
                                data-parent="#accordion">
                                <div class="card-body pl-3 pr-3 pb-3">
                                    <form action="javascript:void" id="formCategories">
                                        <ul class="pag-list">
                                            @foreach(\App\Models\Category::all()->where("status","=",1) as $page)
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="menuItem[]"
                                                        class="categories-select-all"
                                                        value='{"link":"{{$page->link}}","title":"{{$page->name}}"}'>
                                                    {{$page->name}}
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <label class="btn btn-info w-50"
                                            style="float: left;margin-right: 4px;margin-left: -6px;">
                                            <input type="checkbox" style="width: 18px;display: none;"
                                                id="categories-select-all" name="categories-select-all"> Tümünü Seç
                                        </label>
                                        <button class="btn btn-success w-50" style="margin-right: -4px;">Menüye
                                            Ekle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card m-0 pt-0">
                            <div class="card-header p-0 m-0" id="headingLinks"
                                style="position:relative;min-height: 50px;">
                                <button class="btn btn-dark m-0"
                                    style="position: absolute; width: 100%;border-radius: 0px; font-size:18px;height: 100%;"
                                    data-toggle="collapse" data-target="#collapseLinks" aria-expanded="true"
                                    aria-controls="collapseLinks">
                                    Linkler
                                </button>
                            </div>
                            <div id="collapseLinks" class="collapse" aria-labelledby="headingLinks"
                                data-parent="#accordion">
                                <div class="card-body pl-3 pr-3 pb-3">
                                    <form action="javascript:void" id="formLinks">
                                        <ul class="pag-list">
                                            <li>
                                                <label for="title">Başlık</label>
                                                <input type="text" class="form-control" id="title"
                                                    placeholder="Bir Başlık Giriniz..." name="title">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" id="link" name="link"
                                                    placeholder="Bir Link Giriniz...">
                                            </li>
                                        </ul>
                                        <button class="btn btn-success w-100">Menüye Ekle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form action="javascript:void" method="post" id="formStore">
                        @csrf
                        <div class="card">
                            <div class="card-header p-0 ml-3" style="min-height: 40px;">
                                <label for="menuTitle"
                                    style="font-size: 18px;width:130px;margin-top:4px;text-align:right;">Menü
                                    Başlığı</label>
                                <input type="text" name="menuTitle" class="form-control m-0 w-50 ml-3 h-100"
                                    placeholder="Menü Başlığı Giriniz..." id="menuTitle"
                                    style="border-radius: 0px;display: block;min-width: 310px;">
                                <button class="btn btn-primary mr-auto ml-3" id="save"
                                    style="border-radius: 0px;min-height:40px;margin: 0px;font-size: 15px;">Menüyü
                                    Kaydet</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="divRootMenuList" id="nestable3">
                                            <div class="dd-collapsed"></div>
                                            <ul class="rootMenuList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section("script")
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ilikenwf.github.io/jquery.mjs.nestedSortable.js"></script>
<script src="{{asset("administrator/assets/jquery.nestable.js")}}"></script>
<script>

    $(document.body).on("click", "#FormPages button", function () {
        $('input[type=checkbox]:checked').each(function () {
            var item = $(this).val();
            if (typeof item !== "undefined") {
                var obj = window.JSON.parse(item);
                var html = `<li class="dd-item item_added page_item" data-title="${obj.title}" data-link="${obj.link}" >
                            <div class="menu-header">
                                <strong class="menuItemTitle">${obj.title}</strong>
                                <div class="buttons">
                                    <a href="" class="btn-danger delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                     <a href="" class="btn-warning edit">
                                        <i class="fas fa-edit"></i>
                                     </a>
                                    <a href="" class="btn-primary handle">
                                        <i class="fas fa-arrows-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <input type="text" name="title[]" class="form-control menuItemFromTitle " value="${obj.title}">
                                <input type="text" name="link[]"  class="form-control menuItemFromLink " value="${typeof obj.link != "undefined" ? obj.link : '/'}">
                            </div>
                            <ul class="menuList MenuListSortable"></ul>
                        </li>`;
                $(".rootMenuList").append(html);
                $("input[type=checkbox]:checked").prop('checked', false);
            }
        });
        return false;
    });

    $(document.body).on("click", "#formCategories button", function () {
        $('input[type=checkbox]:checked').each(function () {
            var item  = $(this).val();
            if (typeof item !== "undefined") {
                var obj = window.JSON.parse(item);
                var html = `<li class="dd-item item_added category_item"  data-title="${obj.title}" data-link="${obj.link}" >
                            <div class="menu-header">
                                <strong class="menuItemTitle">${obj.title}</strong>
                                <div class="buttons">
                                    <a href="" class="btn-danger delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                     <a href="" class="btn-warning edit">
                                        <i class="fas fa-edit"></i>
                                     </a>
                                    <a href="" class="btn-primary handle">
                                        <i class="fas fa-arrows-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <input type="text" name="title[]" class="form-control menuItemFromTitle" value="${obj.title}">
                                <input type="text" name="link[]"  class="form-control menuItemFromLink" value="${typeof obj.link != "undefined" ? obj.link : '/'}">
                            </div>
                            <ul class="menuList MenuListSortable"></ul>
                        </li>`;
                $(".rootMenuList").append(html);
                $("input[type=checkbox]:checked").prop('checked', false);
            }
        });
        return false;
    });

    $(document.body).on("click", "#formLinks button", function () {
        var title = $("input[name=title]").val();
        var link = $("input[name=link]").val();
        if (title != "" || link != "") {
            var html = `<li class="dd-item item_added" data-id="1" data-title="${title}" data-link="${title}" >
                            <div class="menu-header">
                                <strong class="menuItemTitle">${title}</strong>
                                <div class="buttons">
                                    <a href="" class="btn-danger delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                     <a href="" class="btn-warning edit">
                                        <i class="fas fa-edit"></i>
                                     </a>
                                    <a href="" class="btn-primary handle">
                                        <i class="fas fa-arrows-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="content" >
                                <input type="text" name="title[]" class="form-control menuItemFromTitle" value="${title}">
                                <input type="text" name="link[]"  class="form-control menuItemFromLink" value="${link}">
                            </div>
                            <ul class="menuList"></ul>
                        </li>`;
            $(".rootMenuList").append(html);
            $("input[name=title]").val("");
            $("input[name=link]").val("");
        }
        return false;
    });

    $(document).on("input", ".menuItemFromTitle", function () {
        var title = $(this).val();
        $(this).attr("value",title);
        $(this).parent().parent().attr("data-title",title);
        $(this).parent().parent().children(".menu-header").find(".menuItemTitle").text(title);
    });

    $(document).on("input", ".menuItemFromLink", function () {
        if(!$(this).hasClass("page_item") || !$(this).hasClass("category_item")){
            var link = $(this).val();
            $(this).attr("value",link);
            $(this).parent().parent().attr("data-link",link);
            $(this).parent().parent().children(".menu-header").find(".menuItemFromLink").text(link);
        }
    });

    $(document).on("click", ".edit", function () {
        if(!$(this).hasClass("page_item") || !$(this).hasClass("category_item")){
            $(this).parent().parent().parent().find(">.content").toggle();
            return false;
        }
    });


    $(document).ready(function () {
        $(document.body).on("click", "#formStore button", function () {
            if ($(".rootMenuList li").hasClass("item_added")) {
                var menuTitle = $("#menuTitle").val();
                if(menuTitle != "")
                {
                    var content = $("#nestable3").nestable('serialize');
                    $.ajax({
                        url: "{{route("admin.appearance.menus.store")}}",
                        type: "POST",
                        data: {content:content, menuTitle: menuTitle, "_token": "{{csrf_token()}}" },
                        success: function (res) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'Tebrikler menü başarıyla kaydedildi.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function (){
                                window.location = "{{route("admin.appearance.menus.index")}}";
                            });
                        }
                    });
                }else
                {
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Menü başlığı boş olamaz!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }else{
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Menü de en az bir eleman olmak zorunda!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target), output = list.data('output');
                if (window.JSON) {
                }
            };
            $("#nestable3", document.body).nestable().on('change', updateOutput);
    });







    $(document).on('click', "ul.rootMenuList li .menu-header .buttons  .delete", function () {
        var item = $(this).parent().parent().parent();
        item.remove();
        return false;
    });

    $(document.body).on("click", ".handle", function () {
        return false;
    })

    $('#pages-select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.pages-select-all:checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $('.pages-select-all:checkbox').each(function () {
                this.checked = false;
            });
        }
    });

    $('#categories-select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.categories-select-all:checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $('.categories-select-all:checkbox').each(function () {
                this.checked = false;
            });
        }
    });

</script>
@endsection
