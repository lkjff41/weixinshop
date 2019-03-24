<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;
use think\Controller;
use think\Request;
use app\api\model\Theme as ThemeModel;

class Theme extends Controller
{
    /*
     * @url /theme?ids=id1,id2,id3
     * @return theme模型
     */
    public function getSimpleList($ids=''){
        (new IDCollection())->goCheck();

        $ids = explode(',',$ids);
        $result = ThemeModel::with(['topicImg','headImg'])->select($ids);
        //这个方法 查询对象是否为空  因为返回对象是collection
        if ($result->isEmpty()){
            throw new ThemeException();
        }
        return json($result);
    }

/*
 * @url /theme/:id
 *
 */
    public function getComplexOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $result = ThemeModel::getThemeWithProducts($id);
        if ($result->isEmpty()){
            throw new ThemeException();
        }
        return json($result);
    }
}
