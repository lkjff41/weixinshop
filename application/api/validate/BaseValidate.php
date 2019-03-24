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
}
