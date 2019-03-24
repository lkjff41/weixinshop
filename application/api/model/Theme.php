<?php

namespace app\api\model;

use think\Model;

class Theme extends BaseModel
{
    protected $hidden = ['topic_img_id','head_img_id','delete_time','update_time'];

    public function topicImg(){
        return $this->belongsTo('image','topic_img_id','id');
    }
    public function headImg(){
        return $this->belongsTo('image','head_img_id','id');
    }

    public function products(){
        return $this->belongsToMany('product','themeProduct','product_id','theme_id');
    }

    public static function getThemeWithProducts($id){
        $theme = self::with(['products','topicImg','headImg'])->find($id);
        return $theme;
    }
}
