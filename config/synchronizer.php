<?php
return [
    'api_url' => env('API_URL_HOLDED', 'https://api.holded.com/api/invoicing/v1/'),
    'api_key' => env('API_KEY_HOLDED', 'fb26799641c8ce2038631e031bcd34d2'),
    'config' => [
            'timeout' => env('API_TIMEOUT_HOLDED', 180),
            'retries' => env('API_RETRIES_HOLDED', 2),
            'retries_delay_seconds' => env('API_RETRIES_DELA_HOLDED', 5),
            'api_key_header' => env('API_KEY_HEADER_HOLDED', 'key'),
            'api_accept_header' => env('API_ACCEPT_HEADER_HOLDED', 'accept'),
        ],
    ];
