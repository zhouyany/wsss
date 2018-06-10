<?php
/**
 * @Author: anchen
 * @Date:   2018-06-08 09:53:13
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-06-08 20:20:40
 */

创建login中间件用于全局注册
php artisan make:middleware loginMiddleware

填写代码
位置：C:\phpStudy\PHPTutorial\WWW\mylaravels\laravels\app\Http\Middleware\loginMiddleware;
$path = $request->path();
        $rts = date('Y-m-d H:i:s')."你访问的路径是".$path;
        file_put_contents('request.log',$rts . "\r\n",FILE_APPEND);

全局注册
注册
位置：C:\phpStudy\PHPTutorial\WWW\mylaravels\laravels\app\Http\kernel.php 前半段
 写入：\App\Http\Middleware\LoginMiddleware::class,

 创建test中间件用于路由注册
 php artisan make:middleware TestMiddleware

 填写代码
 位置：C:\phpStudy\PHPTutorial\WWW\mylaravels\laravels\app\Http\Middleware\TestMiddleware.php
  判断session是否有值，没值跳转登录页面
 if(!session('uid')){
    return redirect('test');
 }

 路由注册
 位置：C:\phpStudy\PHPTutorial\WWW\mylaravels\laravels\app\Http\kernel.php 后半段
 写入：'test'=> \App\Http\Middleware\TestMiddleware::class,

在去路由规则routes.php页面

  写入登录页面的路由：
Route::get('/test',function(){
    echo '这里是登录页面';
});
写入后台设置页面的路由：
（一）
 Route::get('/shezhi',function(){
   echo '这里是后台设置页面！';
})->Middleware('test');
 （二）
 Route::get('shezhi',[
    'Middleware'=>'test',
    'uses'=>function(){  
      echo '这里是后台设置页面！';   
    }
    ]);
 强制加上session
 Route::get('/s',function(){
   session(['uid'=>100]);
});

