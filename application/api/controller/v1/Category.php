<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/24
 * Time: 22:03
 */

namespace app\api\controller\v1;


use app\lib\exception\CategoryException;
use think\Controller;
use app\api\model\Category as CategoryModel;

class Category extends Controller
{
    /**
     * @return 获取分类
     * @throws CategoryException
     */
    public function getAllCategories(){
        $result = CategoryModel::getcate();
        if ($result->isEmpty()){
            throw new CategoryException();
        }
        return json($result);
    }
}
