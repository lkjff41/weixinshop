<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 21:38
 */

namespace app\api\controller\v2;

use app\api\model\Banner as BannerModel;
use app\api\model\Image;
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
        return 'aaaaaaaaaaaaaaaaaaa0';
    }
}
