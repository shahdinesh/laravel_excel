<?php

Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{tasks}', 'TasksController@show');

Route::get('/', 'PostsController@index');

// Route::get('/blogs', 'BlogsController@index');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/create', 'PostsController@create_post');

Route::get('/students', 'StudentsController@index');
Route::get('/students/import', 'StudentsController@import');
Route::post('/students/import', 'StudentsController@import_post');

Route::get('/library', 'LibraryController@index');
