@extends("templates.app")
@section("content")
    {!! templateHook()->doAction("get_template_widget_group",['action_group'=>"contents"]) !!}
@stop