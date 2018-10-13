<?php

declare(strict_types=1);

namespace League\Flysystem\Onedrive;

use League\Flysystem\Filesystem;
use Microsoft\Graph\Graph;
use NicolasBeauvais\FlysystemOneDrive\OneDriveAdapter;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        \Storage::extend('onedrive', function ($app, $config) {
            $graph = new Graph();
            $graph->setAccessToken(\Cache::get('microsoft_access_token'));
            $adapter = new OneDriveAdapter($graph, $config['prefix'] ?? 'root');

            return new Filesystem($adapter);
        });
    }
}
