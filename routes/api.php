<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('content-categories', 'ContentCategoryApiController');

    Route::apiResource('content-tags', 'ContentTagApiController');

    Route::apiResource('content-pages', 'ContentPageApiController');

    Route::apiResource('bahagians', 'BahagianApiController');

    Route::apiResource('cawangans', 'CawanganApiController');

    Route::apiResource('biros', 'BiroApiController');

    Route::apiResource('user-profiles', 'UserProfileApiController');

    Route::apiResource('aktivitis', 'AktivitiApiController');

    Route::apiResource('rekod-pembayarans', 'RekodPembayaranApiController');
});
