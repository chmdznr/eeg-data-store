<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Pregnant Data
    Route::apiResource('pregnant-datas', 'PregnantDataApiController');

    // Pregnant Eeg
    Route::apiResource('pregnant-eegs', 'PregnantEegApiController');

    // Newborn Cv
    Route::post('newborn-cvs/media', 'NewbornCvApiController@storeMedia')->name('newborn-cvs.storeMedia');
    Route::apiResource('newborn-cvs', 'NewbornCvApiController');

    // Newborn Eeg
    Route::apiResource('newborn-eegs', 'NewbornEegApiController');

    // Newborn Data
    Route::apiResource('newborn-datas', 'NewbornDataApiController');
});
