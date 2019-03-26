<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 23:34
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Exception;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $params = input('param.');
//        dump($params);
        $result = $this->batch()->check($params);
        if (!$result){
            $e = new ParameterException([
                'msg'=>$this->error,
            ]);
//            $e->msg = $this->error;
            throw $e;
        }else{
            return true;
        }
    }

//    正整数验证方法
    protected function isPostiveInteger($value,$rule = '',$data = '',$field = ''){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }else{
            return false;
//            return $field.'必须是正整数';
        }
    }

    protected function isNotEmpty($value,$rule='',$data='',$field=''){
        if (empty($value)){
            return false;
        }else{
            return true;
        }
    }
}
