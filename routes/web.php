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

// Route::get('/', function () {
//     return view('layouts/admin');
// });

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('dashboard','DashBoardController');
Route::resource('/','WelcomeController');
Route::resource('home','HomeController');
Route::get('adm/centro/create_cartera_servicio/{id}',[
	'as' => 'create-cartera-servicio',
	'uses' => 'CarteraServicioController@create_cartera_servicio'
]);
Route::post('adm/centro/store_cartera_servicio/{id}',[
	'as' => 'store-cartera-servicio',
	'uses' => 'CarteraServicioController@store_cartera_servicio'
]);
Route::get('adm/centro/actualizar_cartera_servicio',[
	'as' => 'actualizar-cartera-servicio',
	'uses' => 'CarteraServicioController@actualizar_cartera_servicio'
]);
Route::get('adm/centro/index_cartera_servicio/{id}',[
	'as' => 'index-cartera-servicio',
	'uses' => 'CarteraServicioController@index_cartera_servicio'
]);
Route::get('adm/centro/show_cartera_servicio/{id_cartera_servicio}/{id_centro}',[
	'as' => 'show-cartera-servicio',
	'uses' => 'CarteraServicioController@show_cartera_servicio'
]);
Route::get('adm/centro/edit_cartera_servicio/{id_cartera_servicio}/{id_centro}',[
	'as' => 'edit-cartera-servicio',
	'uses' => 'CarteraServicioController@edit_cartera_servicio'
]);
Route::get('adm/centro/renovate_cartera_servicio/{id_cartera_servicio}/{id_centro}',[
	'as' => 'renovate-cartera-servicio',
	'uses' => 'CarteraServicioController@renovate_cartera_servicio'
]);
Route::get('adm/centro/generar_excel_cartera_servicio/{id_cartera_servicio}/{id_centro}',[
	'as' => 'generar-excel-cartera-servicio',
	'uses' => 'CarteraServicioController@generar_excel_cartera_servicio'
]);

Route::get('adm/centro/create_rol_turno_emergencia/{id}',[
	'as' => 'create-rol-turno-emergencia',
	'uses' => 'RolTurnoController@create_rol_turno_emergencia'
]);
Route::get('adm/centro/create_rol_turno_consulta/{id_centro}/{id_rol_turno}',[
	'as' => 'create-rol-turno-consulta',
	'uses' => 'RolTurnoController@create_rol_turno_consulta'
]);
Route::get('adm/centro/create_rol_turno_hospitalizacion/{id_centro}/{id_rol_turno}',[
	'as' => 'create-rol-turno-hospitalizacion',
	'uses' => 'RolTurnoController@create_rol_turno_hospitalizacion'
]);
Route::get('adm/centro/create_rol_turno_personal_encargado/{id_centro}/{id_rol_turno}',[
	'as' => 'create-rol-turno-personal-encargado',
	'uses' => 'RolTurnoController@create_rol_turno_personal_encargado'
]);
Route::post('adm/centro/store_rol_turno_emergencia/{id_centro}',[
	'as' => 'store-rol-turno-emergencia',
	'uses' => 'RolTurnoController@store_rol_turno_emergencia'
]);
Route::post('adm/centro/store_rol_turno_consulta/{id_centro}/{id_rol_turno}',[
	'as' => 'store-rol-turno-consulta',
	'uses' => 'RolTurnoController@store_rol_turno_consulta'
]);
Route::post('adm/centro/store_rol_turno_hospitalizacion/{id_centro}/{id_rol_turno}',[
	'as' => 'store-rol-turno-hospitalizacion',
	'uses' => 'RolTurnoController@store_rol_turno_hospitalizacion'
]);
Route::post('adm/centro/store_rol_turno_personal_encargado/{id_centro}/{id_rol_turno}',[
	'as' => 'store-rol-turno-personal-encargado',
	'uses' => 'RolTurnoController@store_rol_turno_personal_encargado'
]);
Route::get('adm/centro/index_rol_turno/{id}',[
	'as' => 'index-rol-turno',
	'uses' => 'RolTurnoController@index_rol_turno'
]);
Route::get('adm/centro/show_rol_turno/{id}/{id_centro}',[
	'as' => 'show-rol-turno',
	'uses' => 'RolTurnoController@show_rol_turno'
]);
Route::get('adm/centro/show_rol_turno_emergencia/{id_rol_turno}/{id_centro}',[
	'as' => 'show-rol-turno-emergencia',
	'uses' => 'RolTurnoController@show_rol_turno_emergencia'
]);
Route::get('adm/centro/show_rol_turno_consulta/{id_rol_turno}/{id_centro}',[
	'as' => 'show-rol-turno-consulta',
	'uses' => 'RolTurnoController@show_rol_turno_consulta'
]);
Route::get('adm/centro/show_rol_turno_hospitalizacion/{id_rol_turno}/{id_centro}',[
	'as' => 'show-rol-turno-hospitalizacion',
	'uses' => 'RolTurnoController@show_rol_turno_hospitalizacion'
]);
Route::get('adm/centro/show_rol_turno_personal_encargado/{id_rol_turno}/{id_centro}',[
	'as' => 'show-rol-turno-personal-encargado',
	'uses' => 'RolTurnoController@show_rol_turno_personal_encargado'
]);
Route::get('adm/centro/edit_rol_turno/{id_rol_turno}/{id_centro}',[
	'as' => 'edit-rol-turno',
	'uses' => 'RolTurnoController@edit_rol_turno'
]);
Route::get('adm/centro/edit_rol_turno_emergencia/{id_rol_turno}/{id_centro}',[
	'as' => 'edit-rol-turno-emergencia',
	'uses' => 'RolTurnoController@edit_rol_turno_emergencia'
]);
Route::get('adm/centro/edit_rol_turno_consulta/{id_rol_turno}/{id_centro}',[
	'as' => 'edit-rol-turno-consulta',
	'uses' => 'RolTurnoController@edit_rol_turno_consulta'
]);
Route::get('adm/centro/edit_rol_turno_hospitalizacion/{id_rol_turno}/{id_centro}',[
	'as' => 'edit-rol-turno-hospitalizacion',
	'uses' => 'RolTurnoController@edit_rol_turno_hospitalizacion'
]);
Route::get('adm/centro/edit_rol_turno_personal_encargado/{id_rol_turno}/{id_centro}',[
	'as' => 'edit-rol-turno-personal-encargado',
	'uses' => 'RolTurnoController@edit_rol_turno_personal_encargado'
]);
Route::patch('adm/centro/update_rol_tuno/{id}',[
	'as' => 'update-rol-turno',
	'uses' => 'RolTurnoController@update_rol_tuno'
]);
Route::patch('adm/centro/update_rol_tuno_emergencia/{id_rol_turno}/{id_centro}',[
	'as' => 'update-rol-turno-emergencia',
	'uses' => 'RolTurnoController@update_rol_tuno_emergencia'
]);
Route::patch('adm/centro/update_rol_tuno_consulta/{id_rol_turno}/{id_centro}',[
	'as' => 'update-rol-turno-consulta',
	'uses' => 'RolTurnoController@update_rol_tuno_consulta'
]);
Route::patch('adm/centro/update_rol_tuno_hospitalizacion/{id_rol_turno}/{id_centro}',[
	'as' => 'update-rol-turno-hospitalizacion',
	'uses' => 'RolTurnoController@update_rol_tuno_hospitalizacion'
]);
Route::patch('adm/centro/update_rol_tuno_personal_encargado/{id_rol_turno}/{id_centro}',[
	'as' => 'update-rol-turno-personal-encargado',
	'uses' => 'RolTurnoController@update_rol_tuno_personal_encargado'
]);
Route::get('adm/centro/renovate_rol_turno/{id_rol_turno}/{id_centro}',[
	'as' => 'renovate-rol-turno',
	'uses' => 'RolTurnoController@renovate_rol_turno'
]);
Route::get('adm/centro/build_rol_turno/{id_rol_turno}/{id_centro}',[
	'as' => 'build-rol-turno',
	'uses' => 'RolTurnoController@build_rol_turno'
]);
Route::get('adm/centro/generar_excel_rol_turno/{id_rol_turno}/{id_centro}',[
	'as' => 'generar-excel-rol-turno',
	'uses' => 'RolTurnoController@generar_excel_rol_turno'
]);
//////////////////////////////////////

Route::resource('adm/centro','CentroMedicoController');
Route::get('adm/centro/{id_centro}/edit_especialidades',[
	'as' => 'edit-especialidades',
	'uses' => 'CentroMedicoController@edit_especialidades'
]);
Route::patch('adm/centro/update_especialidades/{id_centro}',[
	'as' => 'update-especialidades',
	'uses' => 'CentroMedicoController@update_especialidades'
]);
Route::get('adm/centro/{id_centro}/edit_medicos',[
	'as' => 'edit-medicos',
	'uses' => 'CentroMedicoController@edit_medicos'
]);
Route::patch('adm/centro/update_medicos/{id_centro}',[
	'as' => 'update-medicos',
	'uses' => 'CentroMedicoController@update_medicos'
]);

Route::resource('adm/nivel','NivelController');
Route::resource('adm/zona','ZonaController');
Route::resource('adm/especialidad','EspecialidadController');
Route::resource('adm/red','RedController');
Route::resource('adm/servicio','TipoServicioController');
Route::resource('adm/medico','MedicoController');
Route::resource('adm/usuario','UsuarioController');


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
Route::get('/images/tipocentroprivado.png', function () {
	return response()->file('../public/images/tipocentroprivado.png');
});

Route::get('/images/tipocentropublico.png', function () {
	return response()->file('../public/images/tipocentropublico.png');
});



//RUTAS PARA WEB SERVICE

Route::get('imagen-red/{id}',[
	'uses' => 'RedController@get_imagen'
]);
Route::get('imagen-tipoServicio/{id}',[
	'uses' => 'TipoServicioController@get_imagen'
]);
Route::get('imagen-nivel/{id}',[
	'uses' => 'NivelController@get_imagen'
]);
Route::get('imagen-centro/{id}',[
	'uses' => 'CentroMedicoController@get_imagen'
]);

Route::get('get-redes', [
	'uses' => 'RedController@getRedes'
]);
Route::get('get-tiposervicios', [
	'uses' => 'TipoServicioController@getTipoServicios'
]);
Route::get('get-zonas', [
	'uses' => 'ZonaController@getZonas'
]);
Route::get('get-niveles', [
	'uses' => 'NivelController@getNiveles'
]);

Route::get('get-centros', [
	'uses' => 'CentroMedicoController@getCentrosMedicos'
]);
Route::get('get-centro/{id}', [
	'uses' => 'CentroMedicoController@getCentroMedico'
]);

Route::get('get-centrosPorRTN/{id_red}/{id_tipo_servicio}/{id_nivel}', [
	'uses' => 'CentroMedicoController@getCentrosMedicos_por_red_tipo_nivel'
]);


Route::get('get-last_CS/{id}', [
	'uses' => 'CentroMedicoController@get_lastCarteraServicio'
]);
// obtiene las especilidades de una cartera por el id de la cartera 
Route::get('get-especialidadesPorID/{id}', [
	'uses' => 'CarteraServicioController@get_especialidadesPorId'
]);

Route::get('get-serviciosPorIDCarteraIDEspecialidad/{idCartera}/{idEspecilidad}', [
	'uses' => 'CarteraServicioController@get_ServiciosPorIDCarteraIDEspecialidad'
]);

Route::get('get-serviciosPorIDCartera/{idCartera}', [
	'uses' => 'CarteraServicioController@get_ServiciosPorIDCartera'
]);

//para el excel
Route::get('get-excel/{idCartera}/{idCentro}', [
	'uses' => 'CarteraServicioController@generar_excel_cartera_servicio'
]);

//para rol de turnos

Route::get('get-AllRolTurnos/{id}', [
	'uses' => 'CentroMedicoController@get_AllRolTurnos'
]);

Route::get('get-DetalleTurnosPorIdEtapaServicio/{id}', [
	'uses' => 'RolTurnoController@get_DetalleTurnosPorIdEtapaServicio'
]);

Route::get('get-Etapas/{id}', [
	'uses' => 'RolTurnoController@get_EtapasServicios'
]);

Route::get('get-especialidadesPorEtapa/{id}', [
	'uses' => 'RolTurnoController@get_EspecialidadesPorIdEtapa'
]);

Route::get('get-turnosPorEtapa/{id}', [
	'uses' => 'RolTurnoController@get_TurnosPorIdEtapaServicio'
]);

Route::get('get-rolDiaPorEtapa/{id}', [
	'uses' => 'RolTurnoController@get_RolDiasPorIdEtapaServicio'
]);

Route::get('get-medicos', [
	'uses' => 'MedicoController@get_AllMedicos'
]);

Route::get('get-CentroMedico/{id}', [
	'uses' => 'CentroMedicoController@get_CentroMedico'
]);

Route::get('get-centrosPorN-E/{searchText}/{filtro}', [
	'uses' => 'CentroMedicoController@get_CentrosMedicos_por_nombre_o_especialidad'
]);

Route::get('get-cargosPersonal/{id}', [
	'uses' => 'RolTurnoController@get_obtenerPersonalEtapaPersonalArea'
]);


//modificar

// Route::get('get-especialidades',[
// 	'uses' => 'EspecialidadController@getEspecialidades'
// ]);
// Route::get('get-especialidades-mediante-lugar/{id}',[
// 	'uses' => 'EspecialidadController@getEspecialidadPorLugar'
// ]);
//
// Route::get('get-detalleespecialidades',[
// 	'uses' => 'RedController@getRedes'
// ]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
