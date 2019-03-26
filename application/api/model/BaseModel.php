<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{

//    拼接img表中的url
    public function prefixImgUrl($value,$data){
        $finalUrl = $value;
        if ($data['from']==1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}
