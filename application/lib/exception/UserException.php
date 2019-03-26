<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 17:11
 */

namespace app\lib\exception;



class UserException extends BaseException
{
    public $code = 404;
    public $msg = '请求用户不存在';
    public $errorCode = 60000;
}
