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

Route::get('/', function () {
    return view('layouts/admin');
});
Route::resource('dashboard','DashBoardController');
Route::resource('home','HomeController');
Route::get('adm/centro/create_cartera_servicio/{id}',[
	'as' => 'create-cartera-servicio',
	'uses' => 'CarteraServicioController@create_cartera_servicio'
]);
Route::get('adm/centro/guardar_cartera_servicio',[
	'as' => 'guardar-cartera-servicio',
	'uses' => 'CarteraServicioController@guardar_cartera_servicio'
]);
Route::get('adm/centro/actualizar_cartera_servicio',[
	'as' => 'actualizar-cartera-servicio',
	'uses' => 'CarteraServicioController@actualizar_cartera_servicio'
]);
Route::get('adm/centro/index_cartera_servicio/{id}',[
	'as' => 'index-cartera-servicio',
	'uses' => 'CarteraServicioController@index_cartera_servicio'
]);
Route::get('adm/centro/show_cartera_servicio/{id}',[
	'as' => 'show-cartera-servicio',
	'uses' => 'CarteraServicioController@show_cartera_servicio'
]);
Route::get('adm/centro/edit_cartera_servicio/{id_cartera_servicio}/{id_centro}',[
	'as' => 'edit-cartera-servicio',
	'uses' => 'CarteraServicioController@edit_cartera_servicio'
]);
Route::get('adm/centro/renovate_cartera_servicio/{id}',[
	'as' => 'renovate-cartera-servicio',
	'uses' => 'CarteraServicioController@renovate_cartera_servicio'
]);

Route::get('adm/centro/create_rol_turno/{id}',[
	'as' => 'create-rol-turno',
	'uses' => 'RolTurnoController@create_rol_turno'
]);
Route::get('adm/centro/guardar_rol_turno',[
	'as' => 'guardar-rol-turno',
	'uses' => 'RolTurnoController@guardar_rol_turno'
]);
Route::get('adm/centro/index_rol_turno/{id}',[
	'as' => 'index-rol-turno',
	'uses' => 'RolTurnoController@index_rol_turno'
]);
Route::get('adm/centro/show_rol_turno/{id}',[
	'as' => 'show-rol-turno',
	'uses' => 'RolTurnoController@show_rol_turno'
]);
Route::get('adm/centro/edit_rol_turno/{id}',[
	'as' => 'edit-rol-turno',
	'uses' => 'RolTurnoController@edit_rol_turno'
]);
Route::get('adm/centro/actualizar_rol_tuno',[
	'as' => 'actualizar-rol-turno',
	'uses' => 'RolTurnoController@actualizar_rol_tuno'
]);
Route::get('adm/centro/renovate_rol_turno/{id}',[
	'as' => 'renovate-rol-turno',
	'uses' => 'RolTurnoController@renovate_rol_turno'
]);
//////////////////////////////////////

Route::resource('adm/centro','CentroMedicoController');
Route::resource('adm/nivel','NivelController');
Route::resource('adm/zona','ZonaController');
Route::resource('adm/especialidad','EspecialidadController');
Route::resource('adm/red','RedController');
Route::resource('adm/servicio','TipoServicioController');
Route::resource('adm/medico','MedicoController');



// Route::resource('adm/enfermedad','EnfermedadController');
// Route::resource('adm/sintoma','SintomaController');


Route::get('/images/redCentro.png', function () {
    return response()->file('../public/images/redCentro.png');
});
Route::get('/images/redEste.png', function () {
    return response()->file('../public/images/redEste.png');
});
Route::get('/images/redSur.png', function () {
    return response()->file('../public/images/redSur.png');
});
Route::get('/images/redNorte.png', function () {
    return response()->file('../public/images/redNorte.png');
});
Route::get('/images/zona_rural.jpg', function () {
    return response()->file('../public/images/zona_rural.jpg');
});
// Route::get('imagen-por-id', function () {
//     return response()->file('../public/images/zona_urbana.jpg');
// });

// Route::get('get-redes',[
// 	'uses' => 'RedController@getRedes'
// ]);

// Route::get('get-sintomas',[
// 	'uses' => 'SintomaController@getSintomas'
// ]);
// Route::get('get-pre-diagnostico/{str}',[
// 	'uses' => 'SintomaController@preDiagnostico'
// ]);
// Route::get('get-pre-diagnostico/',[
// 	'uses' => 'SintomaController@preDiagnosticoNone'
// ]);
Route::get('imagen-red/{id}',[
	'uses' => 'RedController@get_imagen'
]);
Route::get('get-tiposervicios',[
	'uses' => 'TipoServicioController@getTipoServicios'
]);
Route::get('get-zonas',[
	'uses' => 'ZonaController@getZonas'
]);
Route::get('get-niveles',[
	'uses' => 'NivelController@getNiveles'
]);


//modificar

// Route::get('get-lugares',[
// 	'uses' => 'LugarController@getLugares'
// ]);
// Route::get('get-lugar/{id}',[
// 	'uses' => 'LugarController@getLugar'
// ]);
// Route::get('get-lugar-mediante-enfermedad/{id}',[
// 	'uses' => 'LugarController@getLugarPorEnfermedad'
// ]);
// Route::get('get-especialidades',[
// 	'uses' => 'EspecialidadController@getEspecialidades'
// ]);
// Route::get('get-especialidades-mediante-lugar/{id}',[
// 	'uses' => 'EspecialidadController@getEspecialidadPorLugar'
// ]);


//
Route::get('get-detalleespecialidades',[
	'uses' => 'RedController@getRedes'
]);
Route::get('get-enfermedades',[
	'uses' => 'EnfermedadController@getEnfermedades'
]);
Route::get('get-enfermedades-mediante-especialidad/{id}',[
	'uses' => 'EnfermedadController@getEnfermedadesPorEspecialidad'
]);
