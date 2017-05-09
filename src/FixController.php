<?php

namespace gmf;

use luya\console\Command;
use luya\helpers\FileHelper;

class FixController extends Command
{
    public function actionIndex($folder)
    {
        $files = FileHelper::findFiles($folder, ['recursive' => true, 'filter' => function($path) {
            if (strtolower(FileHelper::getFileInfo($path)->extension) == 'md') {
                return true;
            }
            
            return false;
        }]);

        foreach ($files as $file) {
            $content = file_get_contents($file);
            file_put_contents($file, $this->parseContent($content));
        }
    }

    private function parseContent($content)
    {
        return preg_replace('/xC2xA0/',' ',$content);
    }
}