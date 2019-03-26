<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/26
 * Time: 18:32
 */

namespace app\api\controller\v1;


use app\api\model\User as UserModel;
use app\api\model\UserAddress;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address
{

    public function createOrUpdateAddress(){
        $validate = new AddressNew();
        $validate->goCheck();

        (new AddressNew())->goCheck();
//        根据token获取uid
//        根据uid查找用户数据 判断用户是否存在
//        获取用户从客户端提交的地址信息
//        根据用户地址是否存在 从而判断是添加地址还是更新地址
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if (!$user){
            throw new UserException();
        }
        //过滤传入表单字段 只允许验证器有的字段
//        获取表单数据
        $dataArray =$validate->getDataByRule(input('post.'));

        //获取用户的地址信息 有就更新 没有就新增
        $userAddress = $user->address;
        if (!$userAddress){
//            通过关联新增
//            $user->address()->save($dataArray);
            UserAddress::addAddress($dataArray);
        }else{
//            $user->address->save($dataArray);
            UserAddress::updateAddress($dataArray);
        }
        return new SuccessMessage();
    }
}
