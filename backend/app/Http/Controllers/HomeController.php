<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 15:13:25
 * @LastEditTime: 2022-09-07 15:27:04
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function indexAction()
    {
        $dt = new \DateTime();
        $timezone =$dt->getTimezone()->getName();
        $env = env('APP_ENV');
        $debug = env('APP_DEBUG');
        $msg = "<!--env: {$env}, timezone: {$timezone}, debug: {$debug}-->";
        return env('APP_NAME').$msg;
    }
}
