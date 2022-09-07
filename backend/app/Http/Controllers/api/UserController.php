<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 14:41:10
 * @LastEditTime: 2022-09-07 16:20:34
 */

namespace App\Http\Controllers\api;

class UserController extends BaseController
{
    function indexAction() {
        return $this->success("this is user/index page");
    }

    function loginAction() {
        return $this->success(['userid' => 100]);
    }
}
