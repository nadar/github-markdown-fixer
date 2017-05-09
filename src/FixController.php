<?php

namespace gmf;

use luya\console\Command;
use luya\helpers\FileHelper;

class FixController extends Command
{
    public function actionIndex($folder)
    {
        $files = FileHelper::findFiles($folder, [
            'recursive' => true, 
            'caseSensitive' => false, 
            'only'=> ['*.md'],
        ]);

        foreach ($files as $file) {
            $content = file_get_contents($file);
            $newcontent = $this->parseContent($content);
            
            if (strcmp($content, $newcontent) !== 0) {
                $this->outputSuccess('+ Fixed: ' . $file);
            }
            
            file_put_contents($file, $newcontent);
        }
        
        return $this->outputInfo(count($files) . ' files checked');
    }

    private function parseContent($content)
    {
        $content = preg_replace('/xC2xA0/', ' ', $content);
        return preg_replace('~\x{00a0}~siu', ' ', $content);
    }
}