<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 22:51
 */

namespace app\api\validate;


use app\api\validate\BaseValidate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPostiveInteger',
    ];

    protected $message = [
        'id' => 'id必须是正整数'
    ];


}
