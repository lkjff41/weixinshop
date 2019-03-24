<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 17:11
 */

namespace app\lib\exception;



class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在，检查id';
    public $errorCode = 30000;
}
