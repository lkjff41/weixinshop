<?php

namespace app\api\model;

use think\Model;

class User extends BaseModel
{

    public function address(){
        return $this->hasOne('userAddress','user_id','id');
    }

//    通过openid查找
    public static function getByOpenID($openid){
        $user = self::where('openid',$openid)
            ->find();
        return $user;
    }
}
