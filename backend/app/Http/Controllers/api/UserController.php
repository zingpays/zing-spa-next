<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 14:41:10
 * @LastEditTime: 2022-09-08 10:01:23
 */

namespace App\Http\Controllers\api;

class UserController extends AuthController
{
    public function __construct() {
        $this->setAuthSkipList([
            'api/user/index',
            'api/user/login',
        ])->ensureAuth();
    }

    public function indexAction() {
        return $this->success("this is user/index page");
    }

    public function loginAction() {
        return $this->success(['userid' => 100]);
    }

    public function detailAction() {
        return $this->success(['here is user detail info got protected']);
    }

    public function need2faAction() {
        $this->ensure2faAuth();
        return $this->success(['this is need2fa page']);
    }
}
