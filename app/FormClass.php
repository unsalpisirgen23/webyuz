<?php

namespace App;

class FormClass
{
    private $html = "";

    private static $instance;

    public function __construct()
    {
        $this->html = '<div class="form-group row mb-4">
            <div class="col-sm-12 col-md-7">
                
            
        ';
    }

    public function getInput($name,$label,$type = "text")
    {
        $this->html .= '<div class="form-group row mb-4">';
        $this->html .= '<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">'.$label.'</label><div class="col-sm-12 col-md-7">';
        $this->html .= '<input type="'.$type.'" name="'.$name.'" class="form-control"  >';
        $this->html .= '</div></div>';
    }

    public function getTextarea($name,$label)
    {
        $this->html .= '<div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">'.$label.'</label>
            <div class="col-sm-12 col-md-7 h-100">
                <textarea class="form-control h-100" name="'.$name.'" id="'.$name.'" ></textarea>
            </div>
        </div>';
    }


    public function getSelect($name,$label,$values = [])
    {
        $this->html .= '<div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">'.$label.'</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select class="form-control selectric" name="'.$name.'">
                                                      ';
        foreach ($values as $value=>$title)
        {
            $this->html .= '<option value="'.$value.'">'.$title.'</option>';
        }
        $this->html .='</select></div></div>';
    }


    public static function getInstance():self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return  self::$instance;
    }



}