<?php
/**
 * @Author: anchen
 * @Date:   2018-06-09 11:42:09
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-06-09 12:34:37
 */
在命令里创建控制器文件
位置：C:\phpStudy\PHPTutorial\WWW\mylaravels\laravels\app\Http\Controllers
新建方法一：
php artisan make:controller LoginController;
新建一个干净的控制器（二）:
php artisan make:controller LoginController --plain;
普通访问
控制器里写方法：
 public function add(){
        echo '这个是用户增加页面';
    }
匹配路由到控制器，当访问/add这个路由时，就去找控制器TestControlle下找方法
Route::get('/add','TestControlle@add');
带参数访问
控制器里写方法：
public function delete($id){
        echo '这里使用户删除页面'.$id;
    }
匹配路由到控制器：
Route::get('/delete/{id}','ShopController@delete');
别名：

