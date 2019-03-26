<?php

namespace app\api\model;

use think\Model;

class ProductProperty extends BaseModel
{
    protected $hidden = ['id','delete_time','update_time','product_id'];
}
