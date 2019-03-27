<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:07
 */

namespace app\lib\exception;




class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已过期或者无效token';
    public $errorCode = 10001;
}
