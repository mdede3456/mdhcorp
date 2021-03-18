<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Messenger app name
    |--------------------------------------------------------------------------
    |
    | This value is the name of the app which is used in the views or elsewhere
    | in this app.
    |
    */

    'name' => env('APP_NAME', 'MDHCORP Printlabel'),

    /*
    |--------------------------------------------------------------------------
    | Package path
    |--------------------------------------------------------------------------
    |
    | This value is the path of the package or in other meaning, it is the prefix
    | of all the registered routes in this package.
    |
    | e.g. : app.test/MDHPRINTLABEL
    */

    'path' => env('MDHPRINTLABEL_PATH', 'printlabel-app'),

    /*
    |--------------------------------------------------------------------------
    | Package's web routes middleware
    |--------------------------------------------------------------------------
    |
    | This value is the middleware of all routes registered in this package
    | which is by default : auth
    |
    */

    'middleware' => env('MDHPRINTLABEL_MIDDLEWARE', 'auth'),

    /*
    |--------------------------------------------------------------------------
    | Pusher API credentials
    |--------------------------------------------------------------------------
    |
    | This array includes all the credentials that required to use pusher API
    | with Chatty package, which is used to broadcast events over websockets to
    | create a real-time features.
    |
    */
   

    /*
    |--------------------------------------------------------------------------
    | User Avatar
    |--------------------------------------------------------------------------
    |
    | This is the user's avatar setting that includes :
    | [folder]  which is the default folder name to upload and get
    |           user's avatar from.
    | [default] which is the default avatar file name for users stored
    |           in database.
    |
    */
  
    /*
    |--------------------------------------------------------------------------
    | Attachments By Default
    |--------------------------------------------------------------------------
    |
    | This array contains the important default values that used in this package.
    |
    | The first value in this array is the default folder name in the storage
    | which is all the attachments will be stored in.
    | This is also going to be used in attachments urls in the views.
    |
    */
    'attachments' => [
        'folder' => 'attachments',
        // Below is the route name to download attachments.
        'route' => 'attachments.download',
    ],


    /*
    |--------------------------------------------------------------------------
    | Route's controllers namespace
    |--------------------------------------------------------------------------
    |
    | You may need to change the namespace of the route's controllers of
    | this package after publishing the 'controllers' asset, from the
    | default one to your App's controllers namespace.
    |
    | By default: MDHPRINTLABEL\Http\Controllers
    |
    */
    'namespace' => env('MDHPRINTLABEL_ROUTES_NAMESPACE', 'printlabel\Http\Controllers'),
];
