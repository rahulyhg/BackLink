<?php

return array(
    'title' => 'Site Ayarları',

    'edit_fields' => array(
        'site_name' => array(
            'title' => 'Sayfa Adı',
            'type' => 'text',
        ),
        'page_cache_lifetime' => array(
            'title' => 'Sayfa Cache Süresi',
            'type' => 'number',
        ),
    ),

    'actions' => array(
        //Clearing the site cache
        'clear_cache' => array(
            'title' => 'Cache Temizle',
            'messages' => array(
                'active' => 'Cache Temizleniyor ...',
                'success' => 'Cache Temizlendi.',
                'error' => 'Cache Temizlenemiyor!',
            ),
            //the settings data is passed to the function and saved if a truthy response is returned
            'action' => function(&$data)
            {
                Cache::flush();

                //return true to flash the success message
                //return false to flash the default error
                //return a string to show a custom error
                //return a Response::download() to initiate a file download
                return true;
            }
        ),
    ),

);