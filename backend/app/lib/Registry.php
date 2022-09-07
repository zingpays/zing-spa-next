<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 15:50:26
 * @LastEditTime: 2022-09-07 15:50:50
 */

namespace App\lib;

use Ramsey\Uuid\Uuid;

class Registry
{
    private static self $instance;
    private static string $requestId;

    /**
     *Registry storage
     */
    private static array $storage = array();

    public static function getRequestId($renew = false): string
    {
        if ($renew || !isset(self::$requestId)) {
            self::$requestId = Uuid::uuid4()->toString();
        }
        return self::$requestId;
    }

    public static function setRequestId(string $reqId)
    {
        self::$requestId = $reqId;
    }

    /**
     * Get stored object
     * @param $key string
     * @return object
     */
    public static function get($key)
    {
        return self::instance()->_get($key);
    }

    /**
     * Set stored object
     * @param string $key
     * @param object $instance
     */
    public static function set($key, $val)
    {
        return self::instance()->_set($key, $val);
    }

    /**
     * delete object
     * @param $key string
     * @param $val object
     */
    public static function delete($key)
    {
        unset(self::$storage[$key]);
    }

    private static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function _get($key)
    {
        if (isset(self::$storage[$key])) {
            return self::$storage[$key];
        }
        return null;
    }

    private function _set($key, $val)
    {
        self::$storage[$key] = $val;
    }
}
