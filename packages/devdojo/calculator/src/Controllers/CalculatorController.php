<?php

namespace Devdojo\Calculator\Controllers;

use App\Http\Controllers\Controller;
use Devdojo\Calculator\Services\ImageService;
use Illuminate\Support\Facades\App;

class CalculatorController extends Controller
{
    //
    public function add($a, $b){
        echo $a + $b;
    }

    public function subtract($a, $b)
    {
        echo $a - $b;
    }

    public function image()
    {

        /** @var ImageService $imageService */
        $imageService = App::make('ImageProcessor');

        echo $imageService->processImage([]);
        echo "\n";
        echo $imageService->getType();
    }
}