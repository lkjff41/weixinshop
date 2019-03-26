<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 15:55
 */

namespace app\api\controller\v1;

use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code=''){
        (new TokenGet())->goCheck();
        $ut  = new UserToken($code);
        //返回的是字符串token 要转json
        $token = $ut->get();
        return [
            'token' => $token,
        ];
    }
}
