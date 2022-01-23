<?php

namespace Modules\Gallery;

use App\Http\Requests\BaseRequest;

class GalleryCategoriesRequest extends BaseRequest
{
    protected $category;

    public function authorize()
    {
        return parent::authorize(); // TODO: Change the autogenerated stub
    }

    public function postCategory()
    {
        $this->category = $this->post();
        unset($this->category['_token']);
        $this->category["created_at"] = date('Y-m-d H:i:s');
        $this->category["updated_at"] = date('Y-m-d H:i:s');
        return $this->category;
    }

    public function allCategory()
    {
        $this->category = $this->all();
        unset($this->category['_token']);
        return $this->category;
    }

    public function rules()
    {
        parent::rules();
        return [

        ];
    }
}