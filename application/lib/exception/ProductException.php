<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/24
 * Time: 20:56
 */

namespace app\api\validate;


use app\lib\exception\BaseException;

class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '指定商品不存在 检查id';
    public $errorCode = 20000;
}
