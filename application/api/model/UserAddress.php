<?php

namespace app\api\model;

use think\Model;

class UserAddress extends BaseModel
{
    protected $hidden = ['id','delete_time','update_time'];


    public static function addAddress($info){
        self::create($info);
    }

    public static function updateAddress($info){
        self::update($info);
    }
}
