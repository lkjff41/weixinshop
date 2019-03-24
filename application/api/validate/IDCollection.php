<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 22:51
 */

namespace app\api\validate;


use app\api\validate\BaseValidate;

class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs',
    ];

    protected $message = [
        'ids' => 'ids必须是为，分割的正整数',
    ];

    protected function checkIDs($value){
        $values = explode(',',$value);
        if (empty($values)){
            return false;
        }
        foreach ($values as $id){
            if (!$this->isPostiveInteger($id)){
                return false;
            }
            return true;
        }
    }
}
