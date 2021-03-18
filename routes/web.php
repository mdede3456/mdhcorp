<?php

/**
 * -----------------------------------------------------------------
 * NOTE : There is two routes has a name (user & group),
 * any change in these two route's name may cause an issue
 * if not modified in all places that used in (e.g MDHPRINTLABEL class,
 * Controllers, MDHPRINTLABEL javascript file...).
 * -----------------------------------------------------------------
 */


use Illuminate\Support\Facades\Route;

/*
* This is the main app route [MDHPRINTLABEL Messenger]
*/

Route::middleware('auth')->group(function () {
   
});
