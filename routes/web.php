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
URL::forceScheme('https');

Route::redirect('/','/en');

Route::group(['prefix' => '{language}'], function(){
	
Route::get('/', function () {
    return view('welcome');
})->name('langSwitcher');

Route::middleware(['auth'])->group(function(){
	
	Route::get("/getDataAjaxEnclave", "EnclaveController@getDataAjax")->name("getDataAjaxEnclave");
	Route::post("/addAjaxEnclave","EnclaveController@addAjax")->name("addAjaxEnclave");
	Route::post("/updateAjaxEnclave","EnclaveController@updateAjax")->name("updateAjaxEnclave");
	Route::post("/deleteAjaxEnclave","EnclaveController@deleteAjax")->name("deleteAjaxEnclave");

	Route::get("/getDataAjaxFamilia","FamiliaController@getDataAjax")->name("getDataAjaxFamilia");
	Route::post("/addAjaxFamilia","FamiliaController@addAjax")->name("addAjaxFamilia");
	Route::post("/updateAjaxFamilia","FamiliaController@updateAjax")->name("updateAjaxFamilia");
	Route::post("/deleteAjaxFamilia","FamiliaController@deleteAjax")->name("deleteAjaxFamilia");

	Route::get("/getDataAjaxMetodoControl", "MetodoControlController@getDataAjax")->name("getDataAjaxMetodoControl");
	Route::post("/addAjaxMetodoControl","MetodoControlController@addAjax")->name("addAjaxMetodoControl");
	Route::post("/updateAjaxMetodoControl","MetodoControlController@updateAjax")->name("updateAjaxMetodoControl");
	Route::post("/deleteAjaxMetodoControl","MetodoControlController@deleteAjax")->name("deleteAjaxMetodoControl");

	Route::get("/getDataAjaxLocalizacion", "LocalizacionController@getDataAjax")->name("getDataAjaxLocalizacion");
	Route::post("/addAjaxLocalizacion","LocalizacionController@addAjax")->name("addAjaxLocalizacion");
	Route::post("/updateAjaxLocalizacion","LocalizacionController@updateAjax")->name("updateAjaxLocalizacion");
	Route::post("/deleteAjaxLocalizacion","LocalizacionController@deleteAjax")->name("deleteAjaxLocalizacion");

	Route::get('/especies/fotos/{especie_id}','EspecieController@fotos')->name("getFotosEspecie");
	Route::post('/actualizarCampoFotos','FotoController@actualizarCampo')->name("actualizarCampoFotos");
	Route::resource("/fotos","FotoController");
	//Route::post("/fotos/upload","FotoController@upload");

	Route::post('/actualizarCampoEspecies','EspecieController@actualizarCampo')->name('actualizarCampoEspecies');
	Route::resource("/especies","EspecieController");

	//Route::resource("/familias","FamiliaController"); //Este no se usa hasta nuevo aviso
	Route::get("metodosControl","MetodoControlController@index")->name("metodosControl");
	Route::get("enclaves","EnclaveController@index")->name("enclaves");
	Route::get("localizaciones","LocalizacionController@index")->name("localizaciones");
	
	//Seguimientos
	Route::post('/actualizarCampoSeguimientos','SeguimientoController@actualizarCampo')->name("actualizarCampoSeguimientos");
	Route::resource("/seguimientos","SeguimientoController");
	
	Route::get('/seguimientos/{id_seguimiento}/controles','SeguimientoController@controles')->name("getControlesSeguimiento");
	Route::post('/seguimientos/{id_seguimiento}/controles','SeguimientoController@storeControles')->name("setControlesSeguimiento");
	Route::post('/seguimientos/{id_metodo_control}/deletecontroles','SeguimientoController@deleteControles')->name("deleteControlesSeguimiento");
	
	Route::post('/actualizarCampoControl','SeguimientoControlesController@actualizarCampo');
	Route::resource("/seguimientoControles","SeguimientoControlesController");
	//END Seguimientos
	
	Route::get('pdf/{informe}','PDFController@createPDF')->name("pdfs");
	
});

Auth::routes();

Route::get('/main', 'HomeController@index')->name('home');

});//END Grupo idioma

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name("loginSocialite");
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
