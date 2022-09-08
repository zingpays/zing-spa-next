<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-08 09:16:26
 * @LastEditTime: 2022-09-08 10:06:07
 */

namespace App\Http\Controllers\api;

use App\Exceptions\UserException;
use App\lib\ResponseCode;

class AuthController extends BaseController
{
    protected array $authSkipList = [];
    protected array $tfaSkipList = [];

    public function setAuthSkipList(array $skipListArr): self
    {
        $this->authSkipList = $skipListArr;
        return $this;
    }

    public function set2faSkipList(array $skipListArr): self
    {
        $this->tfaSkipList = $skipListArr;
        return $this;
    }

    public function ensureAuth(): void
    {
        $request = request();

        //check skip list
        foreach($this->authSkipList as $requestPath) {
            if($request->is($requestPath)) {
                return;
            }
        }

        //auth
        $isAuth = false;
        if(env('APP_DEBUG')===true && isset($request->all()['skip_auth'])){
            $isAuth = true;
        }
        if(!$isAuth){
            throw new UserException('invalid access token.', ResponseCode::INVALID_ACCESS_TOKEN);
        }
    }

    public function ensure2faAuth(): void
    {
        $request = request();

        //check skip list
        foreach($this->tfaSkipList as $requestPath) {
            if($request->is($requestPath)) {
                return;
            }
        }

        //auth
        $tfaAuthPassed = false;
        if(env('APP_DEBUG')===true && isset($request->all()['skip_2fa_auth'])){
            $tfaAuthPassed = true;
        }
        if(!$tfaAuthPassed){
            throw new UserException('invalid 2fa token.', ResponseCode::INVALID_2FA_TOKEN);
        }
    }
}
