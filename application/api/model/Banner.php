<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 16:02
 */

namespace app\api\model;


use think\Model;
use think\Exception;

class Banner extends Model
{
//    整个model隐藏字段
    protected $hidden = ['update_time','delete_time'];

    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id){
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }
}
