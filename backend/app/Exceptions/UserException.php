<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 16:02:16
 * @LastEditTime: 2022-09-07 16:02:26
 */


namespace App\Exceptions;


use Throwable;

class UserException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
