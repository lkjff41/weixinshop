<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//获取首页轮播图
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
//获取主题图
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
//获取指定主题图片和商品
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');



//获取最新的十五个商品
Route::get('api/:version/product/recent','api/:version.Product/getRecent');
//获取指定分类id的商品
Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');
//获取指定id的商品
Route::get('api/:version/product/:id','api/:version.Product/getOne');


//获取全部分类
Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

//获取令牌
Route::post('api/:version/token/user','api/:version.Token/getToken');
