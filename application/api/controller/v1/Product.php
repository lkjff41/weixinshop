<?php

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\validate\ProductException;
use think\Controller;
use think\Request;
use app\api\model\Product as ProductModel;

class Product extends Controller
{
    /*
     * @url /product/recent
     * @return 首页最新商品
     */
    public function  getRecent($count=15){
        (new Count())->goCheck();
        $result = ProductModel::getMostRecent($count);
        if ($result->isEmpty()){
            throw new ProductException();
        }
        //因为设置成了collection对象 数据集对象 用hidden临时隐藏
        $result = $result->hidden(['summary']);
        return json($result);
    }
}
