<?php

Route::prefix('Users')->group(function () {
\MS\Core\Helper\Comman::loadRoute('Users');
});



Route::prefix('Panel')->group(function () {
\MS\Core\Helper\Comman::loadRoute('Panel');
});




//\MS\Core\Helper\Comman::loadRoute('Role');

Route::prefix('MAS')->group(function () {

\MS\Core\Helper\Comman::loadRoute('MAS');


});


// Route::prefix('MM')->group(function () {

// \MS\Core\Helper\Comman::loadRoute('MM');

// });


// Route::prefix('CCM')->group(function () {


// \MS\Core\Helper\Comman::loadRoute('CCM');
// });

// Route::prefix('PM')->group(function () {

// \MS\Core\Helper\Comman::loadRoute('PM');

// });


// Route::prefix('IM')->group(function () {

// \MS\Core\Helper\Comman::loadRoute('IM');

// });


// Route::prefix('IVR')->group(function () {

// \MS\Core\Helper\Comman::loadRoute('IVR');
// });



// Route::prefix('BM')->group(function () { \MS\Core\Helper\Comman::loadRoute('BM'); });
Route::prefix('NM')->group(function () { \MS\Core\Helper\Comman::loadRoute('NM'); });
Route::prefix('TM')->group(function () { \MS\Core\Helper\Comman::loadRoute('TM'); });
Route::prefix('DM')->group(function () { \MS\Core\Helper\Comman::loadRoute('DM'); });

Route::prefix('AMS')->group(function () { \MS\Core\Helper\Comman::loadRoute('AMS'); });

Route::prefix('TMS')->group(function () { \MS\Core\Helper\Comman::loadRoute('TMS'); });
//Route::prefix('ATMS')->group(function () { \MS\Core\Helper\Comman::loadRoute('ATMS'); });
Route::prefix('NMS')->group(function () { \MS\Core\Helper\Comman::loadRoute('NMS'); });
Route::prefix('IM')->group(function () { \MS\Core\Helper\Comman::loadRoute('IM'); });
Route::prefix('MSCDN')->group(function () { \MS\Core\Helper\Comman::loadRoute('MSCDN'); });
Route::prefix('ANMS')->group(function () { \MS\Core\Helper\Comman::loadRoute('ANMS'); });