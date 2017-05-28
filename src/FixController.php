<?php

namespace gmf;

use luya\console\Command;
use luya\helpers\FileHelper;

/**
 * Fix Markdown Files.
 * 
 * 
 * @author Basil Suter <basil@nadar.io>
 */
class FixController extends Command
{
	/**
	 * @var boolean Whether to run the command but doe not change the file content.
	 */
	public $dry = false;
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \luya\console\Command::options()
	 */
	public function options($actionID)
	{
		return ['dry'];
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \yii\console\Controller::optionAliases()
	 */
	public function optionAliases()
	{
		return ['d' => 'dry'];
	}
	
	/**
	 * Fixing files inside a given Folder.
	 * 
	 * @param string $folder The folder where the markdown files are located.
	 * @return integer
	 */
    public function actionIndex($folder)
    {
        $files = FileHelper::findFiles($folder, [
            'recursive' => true, 
            'caseSensitive' => false, 
            'only'=> ['*.md'],
        ]);

        foreach ($files as $file) {
            $content = $this->getFileContent($file);
            $newcontent = $this->parseContent($content);
            
            if (strcmp($content, $newcontent) !== 0) {
                $this->outputSuccess('+ Fixed: ' . $file);
            }
            
            if (!$this->dry) {
            	file_put_contents($file, $newcontent);
            }
        }
        
        return $this->outputInfo(count($files) . ' files checked');
    }
    
    /**
     * Returns File Content
     * @param string $file
     * @return string|boolean
     */
    public function getFileContent($file)
    {
    	return FileHelper::getFileContent($file);
    }

    /**
     * Parse Content of a File and replace if required.
     * 
     * @param string $content The content to fix
     * @return string The fixed content.
     */
    public function parseContent($content)
    {
    	// replace breaking spaces with spaces
        $content = preg_replace('/xC2xA0/', ' ', $content);
        $content = preg_replace('~\x{00a0}~siu', ' ', $content);
        
        // replace tabs with spaces
        $content = preg_replace('/\t/', '    ', $content);
        
        return $content;
    }
}