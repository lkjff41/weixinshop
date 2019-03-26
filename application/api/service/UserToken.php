<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/25
 * Time: 16:11
 */

namespace app\api\service;

use app\api\model\User as UserModel;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;


    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        //用这个函数拼接api  Url
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    /**
     * @throws Exception
     * 获取接口数据
     */
    public function get(){
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);

        if (empty($wxResult)){
            throw new Exception('获取session_key及openid异常，微信内部错误');
        }else{
//            微信不管成功失败都会返回200   失败会有errcode  判断是否有这个字段
            $loginFail = array_key_exists('errcode',$wxResult);
            if ($loginFail){
                $this->processLoginError($wxResult);
            }else{
                return  $this->grantToken($wxResult);

            }
        }
    }

    //    发放令牌
    //先拿到openid
    //看数据库有没有
    //没有就新增
    //生成令牌 缓存数据 写入缓存
    //把令牌返回到客户端
    //key：令牌
    //value：wxResult,uid,scope
    private function grantToken($wxResult){
        $openid = $wxResult['openid'];
        $user = UserModel::getByOpenID($openid);
        if ($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cachedValue);
        return $token;
    }

//    组成value
    private function prepareCachedValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;
        return $cachedValue;
    }

//    写入缓存然后返回key
    private function saveToCache($cachedValue){
        $key = self::generateToken();
//        数组转换成字符串
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = cache($key,$value,$expire_in);

        if (!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode' => 10005,
            ]);
        }
        return $key;
    }

//    插入openid  返回id
    private function newUser($openid){
        $user = UserModel::create([
            'openid'=>$openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode'],
        ]);
    }
}
