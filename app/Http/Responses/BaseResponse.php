<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 23.12.2021
 * Time: 15:40
 */

namespace App\Http\Responses;


class BaseResponse implements IBaseResponse
{
    protected $pathViews;
    protected $Parameters;

    public function index($parameters = [])
    {
        $this->Parameters = $parameters;
        return view("admin.{$this->pathViews}.index",$this->Parameters);
    }

    public function show($parameters = [])
    {
        $this->Parameters = $parameters;

        return view("admin.{$this->pathViews}.index", $this->Parameters);
    }

    public function create($parameters = [])
    {
        $this->Parameters = $parameters;

        return view("admin.{$this->pathViews}.index", $this->Parameters);
    }

    public function edit($parameters = [])
    {
        $this->Parameters = $parameters;

        return view("admin.{$this->pathViews}.index",$this->Parameters);
    }

    public function custom($path,$parameters = [])
    {
        $this->Parameters = $parameters;
        return view("admin.{$path}", $this->Parameters);
    }

}
