<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 23.12.2021
 * Time: 16:17
 */

namespace App\Http\Responses\Admin;

use App\Http\Responses\BaseResponse;
use App\Http\Responses\IBaseResponse;

class CommentResponse extends BaseResponse implements IBaseResponse
{
    public function __construct()
    {
        $this->pathViews = "CommentResponse";
    }
}
