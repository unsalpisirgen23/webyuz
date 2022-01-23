<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 23.12.2021
 * Time: 16:24
 */

namespace App\Http\Responses\Admin;

use App\Http\Responses\BaseResponse;
use App\Http\Responses\IBaseResponse;

/**
 * Class UserResponse
 * @package App\Http\Responses\Admin
 */
class UserResponse extends BaseResponse implements IBaseResponse
{
    /**
     * UserResponse constructor.
     */
    public function __construct()
    {

        $this->pathViews = "users";
    }
}
