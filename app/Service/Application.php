<?php

namespace App\Service;

class Application extends \Illuminate\Foundation\Application
{

    public function publicPath()
    {
        return dd($this->basePath.DIRECTORY_SEPARATOR.'../public');
    }
}