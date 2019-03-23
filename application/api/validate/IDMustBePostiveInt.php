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
        'id' => 'require|isPostiveInteger'
    ];

    protected function isPostiveInteger($value,$rule = '',$data = '',$field = ''){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }else{
            return $field.'必须是正整数';
        }
    }
}
