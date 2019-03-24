<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 17:11
 */

namespace app\lib\exception;



class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求banner不存在';
    public $errorCode = 10000;
}
