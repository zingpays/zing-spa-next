<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 14:41:10
 * @LastEditTime: 2022-09-07 14:41:31
 */

namespace App\Http\Controllers\api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function indexAction() {
        return "this is user/index page";
    }
}
