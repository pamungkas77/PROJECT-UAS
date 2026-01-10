<?php

$router->get('/', 'AuthController@login');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@auth');
$router->get('/logout', 'AuthController@logout');

$router->get('/dashboard', 'DashboardController@index');

$router->get('/pengaduan', 'PengaduanController@index');
$router->get('/pengaduan/create', 'PengaduanController@create');
$router->post('/pengaduan/store', 'PengaduanController@store');

$router->get('/pengaduan/edit/{id}', 'PengaduanController@edit');
$router->post('/pengaduan/update/{id}', 'PengaduanController@update');
$router->post('/pengaduan/delete/{id}', 'PengaduanController@delete');

$router->post('/pengaduan/updatestatus', 'PengaduanController@updateStatus');
$router->get('/pengaduan/export/pdf', 'PengaduanController@exportPdf');
