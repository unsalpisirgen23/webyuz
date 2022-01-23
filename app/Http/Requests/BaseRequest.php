<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    protected $id;
    protected $status;
    protected $type;

    public function getType()
    {
        $this->type = $this->get('type');
        return $this->type;
    }

    public function postType()
    {
        $this->type = $this->post('type');
        return $this->type;
    }

    public function getStatus()
    {
        $this->status = $this->get('status');
        return $this->status;
    }

    public function postStatus()
    {
        $this->status = $this->post('status');
        return $this->status;
    }

    public function getId()
    {
        $this->id = $this->get('id');
        return $this->id;
    }

    public function postId()
    {
        $this->id = $this->post('id');
        return $this->id;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status'=>"required",
            'type'=>"required"
        ];
    }
}
