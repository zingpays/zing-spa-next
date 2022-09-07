<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 15:49:51
 * @LastEditTime: 2022-09-07 15:50:04
 */

use App\lib\Registry;

function getRequestId($renew = false): string
{
    return Registry::getRequestId($renew);
}

function setRequestId($reqId): void
{
    Registry::setRequestId($reqId);
}
