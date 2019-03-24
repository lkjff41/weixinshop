<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['id','from','update_time','delete_time'];

    //   获取器方法 只要那个表有这个字段 就能读出 $value就是url 所有数据在$data
//直接更改并返回取出来的参数
    public function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value,$data);
    }
}
