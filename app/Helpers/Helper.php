<?php

use Illuminate\Support\Facades\File;

if (!function_exists('getModels')) {
    function getModels(){
        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);
        foreach ($modelFiles as $modelFile) {
            $models[] =  $modelFile->getFilenameWithoutExtension();
        }
        return $models;
    }
}

if (!function_exists('crud')) {
    function crud()
    {
        $crud =  ['create', 'read' , 'update', 'delete'];
        return $crud;
    }
}
