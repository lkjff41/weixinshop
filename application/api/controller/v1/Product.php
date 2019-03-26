<?php

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\validate\IDMustBePostiveInt;
use app\api\validate\ProductException;
use think\Controller;
use think\Request;
use app\api\model\Product as ProductModel;

class Product extends Controller
{

    /**
     * @param int $count
     * @return 首页最新商品
     * @url  /product/recent
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

    /**
     * @param $id
     * @return 根据 分类id 取出商品
     * @url  /product/recent?id=*
     */
    public function getAllInCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $result = ProductModel::getProductsByCategoryId($id);
        if ($result->isEmpty()){
            throw new ProductException();
        }
        $result = $result->hidden(['summary']);
        return $result;
    }

    public function getOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $result = ProductModel::getProductDetail($id);
        if (!$result){
            throw new ProductException();
        }
        dump($result->toArray());
        return $result;
    }
}
