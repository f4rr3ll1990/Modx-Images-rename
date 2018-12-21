<?php
switch ($modx->event->name) {
    case 'OnFileManagerUpload':
        $generator = $modx->newObject('modResource');
        $bases = $source->getBases($directory);
        $fullPath = $bases['pathAbsolute'].ltrim($directory,'/');
        $directory = $source->fileHandler->make($fullPath);
        foreach ($files as $file) {
            $ext = @pathinfo($file['name'],PATHINFO_EXTENSION);
            rename($directory->getPath().$file['name'], $directory->getPath() .
            $generator->cleanAlias($file['name']));
        }
        break;
    default: break;
}
return true;
