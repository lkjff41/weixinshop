<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 23:34
 */

namespace app\api\validate;

use think\Exception;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $params = input('param.');
        dump($params);
        $result = $this->check($params);
        if (!$result){
            $error = $this->error;
            throw new Exception($error);
        }else{
            return true;
        }
    }
}
