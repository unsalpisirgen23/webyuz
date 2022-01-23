@extends("admin.layouts.app")
@section("style")
    <style>
        .templates{
            width: 100%;
            padding: 0px;
            margin: 0px;
            list-style-type: none;
        }
        .templates .item{
            width: 200px;
            height:200px;
            border: solid 1px #ddd;
            margin: 5px;
            position: relative;
            float: left;
        }
        .templates .item strong{
            position: absolute;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background: #baf4;
            padding-left: 4px;
            color: #444;
        }
        .templates .item form button{
            position: absolute;
            right: 0px;
            top: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
            opacity: 0.7;
            border-radius: 0px;
        }

    </style>
@endsection
@section("content")
    <div id="app">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                            <div class="col-md-12">
                                <ul class="templates">
                                    @foreach($templates as $template)
                                        <li class="item">
                                            <form action="{{route("admin.appearance.temps.update")}}" method="post" style="overflow: hidden;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$template->id}}">
                                                <img src="{{asset('assets/'.basename($template->name).'/ss.png')}}" alt="{{basename($template->name)}}" width="100%" style="z-index: 1;" height="100%">
                                                <input type="hidden" name="status" value="{{$template->status == 1 ? 0 : 1}}">
                                                <button class="btn {{$template->status == 1 ? "btn-success" : "btn-danger" }} ">{{$template->status == 1 ? "Pasif Et" : "Aktif Et"}}</button>
                                            </form>
                                            <strong>{{basename($template->name)}}</strong>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section("script")
@endsection
