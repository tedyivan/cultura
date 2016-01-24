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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('categoria','CategoriaController@index');
Route::resource('categoria','CategoriaController');

Route::get('produtos/{categoria}','ProdutoController@produtos');

Route::resource('produto', 'ProdutoController'); 



Route::resource('image','ImageController');

Route::resource('administrador','AdministradorController');
