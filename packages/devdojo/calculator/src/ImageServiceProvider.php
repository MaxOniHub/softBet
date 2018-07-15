<?php
namespace Devdojo\Calculator;

use Devdojo\Calculator\Services\IImageService;
use Devdojo\Calculator\Services\ImageService;
use Devdojo\Calculator\Services\ImageService2;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{

    /**
     * Register ImageService class with the Laravel IoC container.
     *
     * @return void
     */
    public function register()
    {

        /*$this->app->singleton("ImageProcessor", function($app)
        {
            $type = $app['config']->get('image-service.default_type');
            $obj = new ImageService();
            $obj->setType($type);
            return $obj;
        });*/

        $this->app->bind("ImageProcessor", function($app)
        {
            $type = $app['config']->get('image-service.default_type');
            $obj = new ImageService();
            $obj->setType($type);
            return $obj;
        });

     /*   $this->app->bind(IImageService::class, function($app)
        {
            $type = $app['config']->get('image-service.default_type');
            $obj = new ImageService();
            $obj->setType($type);
            return $obj;
        });*/
    }
}
