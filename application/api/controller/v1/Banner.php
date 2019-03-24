<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 21:38
 */

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use think\Exception;
use think\Request;
use app\lib\exception\BannerMissException;

class Banner
{
    /*
     * 获取指定id的banner信息
     * get
     * /banner/:id
     */
    public function getBanner($id){
        (new IDMustBePostiveInt())->goCheck();

        $banner = BannerModel::getBannerByID($id);
        if (!$banner){
            throw new BannerMissException();
        }
        return json($banner);
    }
}
