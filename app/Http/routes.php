<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/a',function (){
    echo "这是A页面！";
});
Route::get('/form',function(){
    return view('form');
});
Route::post('/inster',function(){
    print_r($_POST);
});
Route::get('/put',function(){
    return view('这是PUT提交！');
});
Route::put('/put',function(){
    print_r($_POST);
});
//带参数的路由
/*Route::get('article/{id}',function($id){
    echo '文章详情'.$id;
});*/
//参数限制
Route::get('article/{id}',function($id){
    echo '详情'.$id;
})->where('id','\d+');
//传递多个参数
Route::get('/article/{type}-{id}',function($type,$id){
    echo '当前类型为:'.$type.',当前的id为:'.$id;
});
//路由别名  加别名是为了方便URL创建和跳转
Route::get('/article/admin/user/index',[
    'as'=>'ulist',
    'uses'=>function(){
    echo '这里是你当前详细的位置'.route ('ulist');
    }]);
//404页面设置
ROute::get('/404',function(){
    abort(404);
});

/*Route::get('/test',function(){
    echo '这里是登录页面';
});

Route::get('/shezhi',function(){
   echo '这里是后台设置页面！';
})->Middleware('test');

Route::get('/s',function(){
   session(['uid'=>100]);
});
*/
Route::get('/aa',function(){
   echo '这里是登录页面！';
});
Route::get('/she',function(){
    echo '这里是设置页面';
})->Middleware('shop');

Route::get('/a',function(){
    session(['uid'=>10]);
});
//普通访问
Route::get('/add','TestControlle@add');
//带参数匹配路由到控制器
Route::get('/delete/{id}','ShopController@delete');
//别名设置
Route::get('/user/a/{id}/{name}',[
     'as'=>'user',
    'uses'=>'ShopController@ss',  
    ]);
//中间件的匿名函数换成控制器
Route::get('/aa/{id}',[
     'middleware'=>'shop',
     'uses'=>'ShopController@delete'    
     ]);
Route::get('b/{id}','ShopController@delete')->middleware('shop');
