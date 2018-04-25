<?php

namespace App\Service;

class Application extends \Illuminate\Foundation\Application
{

    public function publicPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'../public';
    }
}