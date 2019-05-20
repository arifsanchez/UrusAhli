<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('audit-logs/destroy', 'AuditLogsController@massDestroy')->name('audit-logs.massDestroy');

    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');

    Route::resource('content-categories', 'ContentCategoryController');

    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');

    Route::resource('content-tags', 'ContentTagController');

    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');

    Route::resource('content-pages', 'ContentPageController');

    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');

    Route::delete('bahagians/destroy', 'BahagianController@massDestroy')->name('bahagians.massDestroy');

    Route::resource('bahagians', 'BahagianController');

    Route::delete('cawangans/destroy', 'CawanganController@massDestroy')->name('cawangans.massDestroy');

    Route::resource('cawangans', 'CawanganController');

    Route::delete('biros/destroy', 'BiroController@massDestroy')->name('biros.massDestroy');

    Route::resource('biros', 'BiroController');

    Route::delete('user-profiles/destroy', 'UserProfileController@massDestroy')->name('user-profiles.massDestroy');

    Route::resource('user-profiles', 'UserProfileController');

    Route::post('user-profiles/media', 'UserProfileController@storeMedia')->name('user-profiles.storeMedia');

    Route::delete('aktivitis/destroy', 'AktivitiController@massDestroy')->name('aktivitis.massDestroy');

    Route::resource('aktivitis', 'AktivitiController');

    Route::delete('rekod-pembayarans/destroy', 'RekodPembayaranController@massDestroy')->name('rekod-pembayarans.massDestroy');

    Route::resource('rekod-pembayarans', 'RekodPembayaranController');

    Route::post('rekod-pembayarans/media', 'RekodPembayaranController@storeMedia')->name('rekod-pembayarans.storeMedia');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
