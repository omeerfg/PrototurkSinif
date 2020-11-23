<?php

require __DIR__ . "/vendor/autoload.php";

use \Prototurk\Core\{App,Route};

$app = new \Prototurk\Core\App();

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

echo route('user', ['id1' => 4 , "id2" => 8]);

Route::get('/', 'Home@index');

Route::get('/user/:id1/:id2', 'User@detail') -> name('user');

Route::prefix("/admin")->group(function (){
    Route::get('/?', function (){
        return "Admin home page";
    });
    Route::get('/users', function (){
        return "Admin user page";
    });
});
echo route('user', ['id1' => 4 , "id2" => 8]);

//echo Route::url('user' , ['id1' => 4 , "id2" => 8]);
//
//Route::get('/user/:id', 'User@detail');
//
//
//Route::get('/users', function (){
//    return 'User Page';
//});
//
//Route::post('/updateUser',function (){
//
//});

Route::dispatch();