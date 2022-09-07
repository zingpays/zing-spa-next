<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 16:07:09
 * @LastEditTime: 2022-09-07 16:14:10
 */

namespace App\Http\Controllers\api;

use App\Exceptions\UserException;

class TestController extends BaseController
{
    public function __construct()
    {
        if(env('APP_DEBUG')!==true){
            die('no permission');
        }
    }

    public function successAction()
    {
        return $this->success();
    }

    public function failedAction()
    {
        return $this->failed('my failure message');
    }

    public function errorAction()
    {
        throw new UserException("my test error");
    }
}
