<?php

namespace app\api\model;

use think\Model;

class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','update_time','product_id'];

//    一对一
    public function imgUrl(){
        return $this->belongsTo('image','img_id','id');
    }
}
