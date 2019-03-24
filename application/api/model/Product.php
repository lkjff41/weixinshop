<?php

namespace app\api\model;

use think\Model;

class Product extends BaseModel
{
    protected $hidden = ['create_time','delete_time','update_time','pivot','from','category_id'];

    //拼接图片url
    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    //首页最新商品
    public static function getMostRecent($count){
        $products = self::limit($count)
            ->where('delete_time',null)
            ->order('create_time desc')
            ->select();
        return $products;
    }
}
