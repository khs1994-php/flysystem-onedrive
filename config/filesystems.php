<?php

declare(strict_types=1);

return [
    'disks' => [
        'onedrive' => [
            'driver' => 'onedrive',
            'prefix' => env('ONEDRIVE_PREFIX', 'root'),
        ],
    ],
];
