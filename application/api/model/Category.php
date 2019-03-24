<?php

namespace app\api\model;

use think\Model;

class Category extends BaseModel
{
    protected $hidden = ['update_time','delete_time'];


    public function products(){
        return $this->hasMany('product','category_id','id');
    }

    public function img(){
        return $this->belongsTo('image','topic_img_id','id');
    }

    public static function getcate(){
        $result = self::with(['img'])->select();
        return $result;
    }
}
