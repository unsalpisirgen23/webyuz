<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 23.12.2021
 * Time: 16:18
 */

namespace App\Http\Responses\Admin;

use App\Http\Responses\BaseResponse;
use App\Http\Responses\IBaseResponse;

class MenuResponse extends BaseResponse implements IBaseResponse
{
    public function __construct()
    {
        $this->pathViews = "menus";
    }
}
