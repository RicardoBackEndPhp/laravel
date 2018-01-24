<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Directory root
Route::get('/', 'HomeController@home');

Route::post('/', 'HomeController@add');

Route::get('/relatorio', 'HomeController@todas');

//Call controller "home" and action "delete"
Route::get('/delete/{idDel}', 'HomeController@delete');

//Call controller "home" and action "feito"
Route::get('/feito/{id}', 'HomeController@feito');



//formas de criar rotas----------------------------------

//chamando uma view
Route::get('/welcome', function () {
    return view('welcome');
});

//msg direta ou acão direta
Route::get('/msg', function () {
    echo "Aqui tem uma menssagem direta.";
});

//chamando controller @ action
Route::get('/homeTeste', 'HomeController@home');

//chamando controller @ action em chamdo via post
Route::post('/homeTeste', 'HomeController@add');

//Usando parâmetros----------------------------------------

//Caso o usuário não passe o id na URL
Route::get('/teste/',function () {
    echo "Favor digitar o id válido";
});

//chamando controller @ action com parâmetro
Route::get('/teste/{id}','HomeController@teste');
