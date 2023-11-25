<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/////////////////////////WEB PRINCIPAL/////////////////////////////////////////
$routes->get('/', 'Home::index', ['namespace' => 'App\Controllers\web']);
$routes->get('/nosotros', 'Home::nosotros', ['namespace' => 'App\Controllers\web']);
$routes->get('/cursos', 'Home::cursos', ['namespace' => 'App\Controllers\web']);
$routes->post('/getEventos', 'Home::getEventosHome', ['namespace' => 'App\Controllers\web']);
$routes->post('/allCursos', 'Home::getCursos', ['namespace' => 'App\Controllers\web']);
$routes->post('/countDocentes', 'Home::countDocentes', ['namespace' => 'App\Controllers\web']);
$routes->post('/countProspectos', 'Home::countProspectos', ['namespace' => 'App\Controllers\web']);
$routes->post('/setProspect', 'Home::saveProspect', ['namespace' => 'App\Controllers\web']);
$routes->get('/news', 'newsController::index', ['namespace' => 'App\Controllers\web']);
$routes->post('/getNews', 'newsController::getNews', ['namespace' => 'App\Controllers\web']);

$routes->get('/novedades', 'newsController::novedadesIndex', ['namespace' => 'App\Controllers\web']);
$routes->post('/getNovedades', 'newsController::getNovedades', ['namespace' => 'App\Controllers\web']);

$routes->post('/bannerVigent', 'BannerControllerHome::getBannerActivo', ['namespace' => 'App\Controllers\web']);
$routes->get('/docentes', 'ProfesoresController::index', ['namespace' => 'App\Controllers\web']);
$routes->post('/getProfesores', 'ProfesoresController::getProfesores', ['namespace' => 'App\Controllers\web']);
$routes->get('/profesor/(:any)', 'ProfesoresController::moreInfo', ['namespace' => 'App\Controllers\web']);
$routes->post('/getMoreProf', 'ProfesoresController::getMoreInfoProfesor', ['namespace' => 'App\Controllers\web']);
$routes->get('/aliados', 'AliadosController::index', ['namespace' => 'App\Controllers\web']);
$routes->post('/getAliados', 'AliadosController::getAliados', ['namespace' => 'App\Controllers\web']);
$routes->get('/aliado/(:any)', 'AliadosController::moreInfo', ['namespace' => 'App\Controllers\web']);
$routes->post('/getMoreAliado', 'AliadosController::getMoreInfoAliado', ['namespace' => 'App\Controllers\web']);
$routes->post('/bannerSecundarios', 'BannerControllerHome::getBannerSecundario', ['namespace' => 'App\Controllers\web']);


///////////////////////ADMINISTRACION//////////////////////////////////////////
// Ruta de inicio de sesión plataforma de administración
$routes->post('/login', 'Login::index');
$routes->get('/login', 'Login::index');
// Ruta Inicio panel de la  plataforma de administración
$routes->post('/adm', 'Admin::index');
$routes->get('/adm', 'Admin::index');
// Ruta para cerrar la sesión abierta
$routes->post('/sign_out', 'Login::salir');
$routes->get('/sign_out', 'Login::salir');
// Ruta para cerrar la sesión abierta
$routes->post('/perfil', 'Perfil::perfil');
$routes->get('/perfil', 'Perfil::perfil');
//--------------------BANNERS------------------------------
// Ruta para banners Activos
$routes->get('/bactivos', 'Banners::bannersactivos');
$routes->post('/bactivos', 'Banners::bannersactivos');
// Ruta para banners Inactivos
$routes->get('/binactivos', 'Banners::bannersinactivos');
$routes->post('/binactivos', 'Banners::bannersinactivos');
// Ruta para crear banners
$routes->post('/bcrear', 'Banners::bannerscrear');
// Ruta para desactivar banners
$routes->get('/bdesactivar', 'Banners::bannersdesactivar');
$routes->post('/bdesactivar', 'Banners::bannersdesactivar');
// Ruta para activar banners
$routes->get('/bactivar', 'Banners::bannersactivar');
$routes->post('/bactivar', 'Banners::bannersactivar');
// Ruta para modificar banners
$routes->get('/bmodificar', 'Banners::bannersmodificar');
$routes->post('/bmodificar', 'Banners::bannersmodificar');
// Ruta para actualizar banners
$routes->get('/bactualizar', 'Banners::bannersactualizar');
$routes->post('/bactualizar', 'Banners::bannersactualizar');
// Ruta para crear banners
$routes->get('/bnuevo', 'Banners::bannersnuevo');
$routes->post('/bnuevo', 'Banners::bannersnuevo');
//--------------------NOTICIAS------------------------------
// Ruta para noticias Activas
$routes->get('/nactivas', 'Noticias::noticiasactivas');
$routes->post('/nactivas', 'Noticias::noticiasactivas');
// Ruta para noticias Inactivas
$routes->get('/ninactivas', 'Noticias::noticiasinactivas');
$routes->post('/ninactivas', 'Noticias::noticiasinactivas');
// Ruta para crear noticias
$routes->post('/ncrear', 'Noticias::noticiascrear');
// Ruta para desactivar noticias
$routes->get('/ndesactivar', 'Noticias::noticiasdesactivar');
$routes->post('/ndesactivar', 'Noticias::noticiasdesactivar');
// Ruta para activar noticias
$routes->get('/nactivar', 'Noticias::noticiasactivar');
$routes->post('/nactivar', 'Noticias::noticiasactivar');
// Ruta para modificar noticias
$routes->get('/nmodificar', 'Noticias::noticiasmodificar');
$routes->post('/nmodificar', 'Noticias::noticiasmodificar');
// Ruta para actualizar noticias
$routes->get('/nactualizar', 'Noticias::noticiasactualizar');
$routes->post('/nactualizar', 'Noticias::noticiasactualizar');
//--------------------EVENTOS------------------------------
// Ruta para eventos activos
$routes->get('/evactivos', 'Eventos::eventosactivos');
$routes->post('/evactivos', 'Eventos::eventosactivos');
// Ruta para eventos Inactivos
$routes->get('/evinactivos', 'Eventos::eventosinactivos');
$routes->post('/evinactivos', 'Eventos::eventosinactivos');
// Ruta para crear eventos
$routes->post('/evcrear', 'Eventos::eventoscrear');
// Ruta para desactivar eventos
$routes->get('/evdesactivar', 'Eventos::eventosdesactivar');
$routes->post('/evdesactivar', 'Eventos::eventosdesactivar');
// Ruta para activar eventos
$routes->get('/evactivar', 'Eventos::eventosactivar');
$routes->post('/evactivar', 'Eventos::eventosactivar');
// Ruta para modificar eventos
$routes->get('/evmodificar', 'Eventos::eventosmodificar');
$routes->post('/evmodificar', 'Eventos::eventosmodificar');
// Ruta para actualizar eventos
$routes->get('/evactualizar', 'Eventos::eventosactualizar');
$routes->post('/evactualizar', 'Eventos::eventosactualizar');
//--------------------PROFESORES------------------------------
// Ruta para profesores activos
$routes->get('/practivos', 'Profesores::profesoresactivos');
$routes->post('/practivos', 'Profesores::profesoresactivos');
// Ruta para profesores Inactivos
$routes->get('/prinactivos', 'Profesores::profesoresinactivos');
$routes->post('/prinactivos', 'Profesores::profesoresinactivos');
// Ruta para crear profesores
$routes->post('/prcrear', 'Profesores::profesorescrear');
// Ruta para desactivar profesores
$routes->get('/prdesactivar', 'Profesores::profesoresdesactivar');
$routes->post('/prdesactivar', 'Profesores::profesoresdesactivar');
// Ruta para activar profesores
$routes->get('/practivar', 'Profesores::profesoresactivar');
$routes->post('/practivar', 'Profesores::profesoresactivar');
// Ruta para modificar profesores
$routes->get('/prmodificar', 'Profesores::profesoresmodificar');
$routes->post('/prmodificar', 'Profesores::profesoresmodificar');
// Ruta para actualizar profesores
$routes->get('/practualizar', 'Profesores::profesoresactualizar');
$routes->post('/practualizar', 'Profesores::profesoresactualizar');
//----------------------CURSOS------------------------------
// Ruta para cursos activos
$routes->get('/cractivos', 'Cursos::cursosactivos');
$routes->post('/cractivos', 'Cursos::cursosactivos');
// Ruta para cursos Inactivos
$routes->get('/crinactivos', 'Cursos::cursosinactivos');
$routes->post('/crinactivos', 'Cursos::cursosinactivos');
// Ruta para crear cursos
$routes->post('/crcrear', 'Cursos::cursoscrear');
// Ruta para desactivar cursos
$routes->get('/crdesactivar', 'Cursos::cursosdesactivar');
$routes->post('/crdesactivar', 'Cursos::cursosdesactivar');
// Ruta para activar cursos
$routes->get('/cractivar', 'Cursos::cursosactivar');
$routes->post('/cractivar', 'Cursos::cursosactivar');
// Ruta para modificar cursos
$routes->get('/crmodificar', 'Cursos::cursosmodificar');
$routes->post('/crmodificar', 'Cursos::cursosmodificar');
// Ruta para actualizar cursos
$routes->get('/cractualizar', 'Cursos::cursosactualizar');
$routes->post('/cractualizar', 'Cursos::cursosactualizar');
//----------------------PROSPECTOS------------------------------
// Ruta para cursos activos
$routes->get('/prospectos', 'Prospectos::prospectos');
$routes->post('/prospectos', 'Prospectos::prospectos');
//----------------------Usuarios------------------------------
// Ruta para usuarios activos
$routes->get('/usactivos', 'Usuarios::usuariosactivos');
$routes->post('/usactivos', 'Usuarios::usuariosactivos');
// Ruta para usuarios Inactivos
$routes->get('/usinactivos', 'Usuarios::usuariosinactivos');
$routes->post('/usinactivos', 'Usuarios::usuariosinactivos');
// Ruta para usear usuarios
$routes->post('/uscrear', 'Usuarios::usuarioscrear');
// Ruta para desactivar usuarios
$routes->get('/usdesactivar', 'Usuarios::usuariosdesactivar');
$routes->post('/usdesactivar', 'Usuarios::usuariosdesactivar');
// Ruta para activar usuarios
$routes->get('/usactivar', 'Usuarios::usuariosactivar');
$routes->post('/usactivar', 'Usuarios::usuariosactivar');
// Ruta para modificar usuarios
$routes->get('/usmodificar', 'Usuarios::usuariosmodificar');
$routes->post('/usmodificar', 'Usuarios::usuariosmodificar');
// Ruta para actualizar usuarios
$routes->get('/usactualizar', 'Usuarios::usuariosactualizar');
$routes->post('/usactualizar', 'Usuarios::usuariosactualizar');
// Ruta para actualizar perfil usuario
$routes->get('/pfactualizar', 'Perfil::actualizarperfil');
$routes->post('/pfactualizar', 'Perfil::actualizarperfil');
// Ruta para actualizar contraseña usuario
$routes->get('/pfactualizarc', 'Perfil::actualizarperfilcontrasena');
$routes->post('/pfactualizarc', 'Perfil::actualizarperfilcontrasena');
//----------------------Aliados------------------------------
// Ruta para aliados Aliados
$routes->get('/alactivos', 'Aliados::aliadosactivos');
$routes->post('/alactivos', 'Aliados::aliadosactivos');
// Ruta para aliados Inactivos
$routes->get('/alinactivos', 'Aliados::aliadosinactivos');
$routes->post('/alinactivos', 'Aliados::aliadosinactivos');
// Ruta para alear aliados
$routes->post('/alcrear', 'Aliados::aliadoscrear');
// Ruta para desactivar aliados
$routes->get('/aldesactivar', 'Aliados::aliadosdesactivar');
$routes->post('/aldesactivar', 'Aliados::aliadosdesactivar');
// Ruta para activar aliados
$routes->get('/alactivar', 'Aliados::aliadosactivar');
$routes->post('/alactivar', 'Aliados::aliadosactivar');
// Ruta para modificar aliados
$routes->get('/almodificar', 'Aliados::aliadosmodificar');
$routes->post('/almodificar', 'Aliados::aliadosmodificar');
// Ruta para actualizar aliados
$routes->get('/alactualizar', 'Aliados::aliadosactualizar');
$routes->post('/alactualizar', 'Aliados::aliadosactualizar');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
