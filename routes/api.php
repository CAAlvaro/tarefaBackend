<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//rotas para Animal
Route::get('mostraAnimal/{id}', 'AnimalController@showAnimal');
Route::get('listaAnimal', 'AnimalController@listAnimal');
Route::post('criaAnimal', 'AnimalController@createAnimal');
Route::put('atualizaAnimal/{id}', 'AnimalController@updateAnimal');
Route::delete('deletaAnimal/{id}', 'AnimalController@deleteAnimal');

//rotas para Pessoa
Route::get('mostraPessoa/{id}', 'PessoaController@showPessoa');
Route::get('listaPessoa', 'PessoaController@listPessoa');
Route::post('criaPessoa', 'PessoaController@createPessoa');
Route::put('atualizaPessoa/{id}', 'PessoaController@updatePessoa');
Route::delete('deletaPessoa/{id}', 'PessoaController@deletePessoa');

//rotas para a relação
Route::get('mostraDonoPorAnimal/{animal_id}', 'OneToManyController@showPessoa');
Route::get('mostraAnimaisPorDono/{pessoa_id}', 'OneToManyController@showAnimals');
Route::put('insereDono/{animal_id}', 'OneToManyController@insertPessoa');
Route::put('removeDono/{animal_id}', 'OneToManyController@removePessoa');
