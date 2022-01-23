@extends("admin.layouts.app")
@section("style")
    <style>
        .module{
            width: 100%;
            height: 100px;
            background: #efecec;
            border: solid 1px #ddd;
            position: relative;
            margin: 5px;
        }

        .module-content{
            position: absolute;
            top: 35px;
            left: 0px;
            right: 0px;
            border-bottom: solid 1px #ddd;
        }

        .module-header{
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 32px;
            background: #f1f1f1;
            border-bottom: solid 1px #ddd;
            text-align: center;
            line-height: 30px;
        }
        .module-footer{
            position: absolute;
            bottom: 0px;
            left: 0px;
            right: 0px;
            display: flex;
            justify-content: space-between;
        }
        .module-footer button{
            text-align: center;
            margin-right: 5px;
            padding: 0px;
            height: 25px;
            line-height:25px;
            border-radius: 0px;
        }
        .module-footer button.btn-success{
            padding: 0px;
            border: 0px;
        }
        .module-footer button.btn-danger{
            padding: 0px;
            border: 0px;
        }
        .module-footer button:last-child{
            margin-right: 1px;
            margin-left: 1px;
        }
    </style>
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Modüller']) !!}
            <div class="section-body">
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                         @foreach($modules as $module)
                                            <div class="col-md-2">
                                                <div class="module">
                                                    <div class="module-header">
                                                        <strong style="font-size: 12px;">{{$module->module_name}}</strong>
                                                    </div>

                                                    <div class="module-content">
                                                        <p style="margin-left: 1px;">
                                                           Versiyon : {{$module->module_version}}
                                                        </p>
                                                    </div>

                                                    <form action="{{route("admin.base_modules.update",$module->id)}}" method="post">
                                                        @csrf
                                                        <div class="module-footer">
                                                            <button class="btn {{$module->module_install == 1  ? "btn-info" : "btn-danger"}}  w-100" name="install" value="{{$module->module_install == 0 ? 1 : 0  }}" >{{$module->module_install == 1  ? "Kaldır" : "Kur"}}</button>
                                                            <input type="hidden" name="status" value="{{$module->module_status}}">
                                                            <button class="{{$module->module_status == 1 ? "btn-success" : "btn-danger" }}  w-100"  name="is_status" {{$module->module_install == 0  ? 'disabled="disabled"' : ""}}  value="1">{{$module->module_status == 1 ? "Pasif Et" : "Aktif Et" }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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