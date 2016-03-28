<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Data
    |--------------------------------------------------------------------------
    |
    | If you have data that will be used in every email (possibly in your
    | templates) this is a good place to set that data once, so each
    | mailer does not need to set it itself.
    |
    */
    'default_data' => [
        'company' => 'Acme Co',
        'email'   => 'info@acme.com',
        'phone'   => '555-123-4567',
    ],

    /*
    |--------------------------------------------------------------------------
    | Directory
    |--------------------------------------------------------------------------
    |
    | By default this package will create new Mailers in the application's
    | 'Mailers' directory. You may choose to override the directory.
    |
    */

    'directory' => 'Mailers',

];
