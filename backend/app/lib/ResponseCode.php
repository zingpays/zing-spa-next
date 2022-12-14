<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 16:10:15
 * @LastEditTime: 2022-09-08 10:05:31
 */


namespace App\lib;


class ResponseCode
{
    const BAD_RESULT = 1000;
    const BAD_TOKEN = 1100;
    const BAD_PARAM = 1200;

    const INVALID_ACCESS_TOKEN = 1400;
    const INVALID_2FA_TOKEN = 1500;
}
