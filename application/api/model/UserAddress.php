<?php

namespace app\api\model;

use think\Model;

class UserAddress extends Model
{

    public static function addAddress($info){
        self::create($info);
    }

    public static function updateAddress($info){
        self::update($info);
    }
}
