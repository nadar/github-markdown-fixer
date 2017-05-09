<?php

namespace gmf;

use luya\console\Command;
use luya\helpers\FileHelper;

class FixController extends Command
{
    public function actionIndex($folder)
    {
        $files = FileHelper::findFiles($folder, ['recursive' => true, 'caseSensitive' => false, ['only'=>['*.md']]]);

        foreach ($files as $file) {
            $this->output('+ ' . $file);
            $content = file_get_contents($file);
            file_put_contents($file, $this->parseContent($content));
        }
    }

    private function parseContent($content)
    {
        $content = preg_replace('/xC2xA0/', ' ', $content);
        return preg_replace('~\x{00a0}~siu', ' ', $content);
    }
}