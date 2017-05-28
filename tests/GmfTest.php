<?php

namespace gmf\tests;

use luya\testsuite\cases\ConsoleApplicationTestCase;
use gmf\FixController;

class GmfTest extends ConsoleApplicationTestCase
{
	public function getConfigArray()
	{
		return [
			'id' => 'gmfconsole',
			'basePath' => dirname(__DIR__),
			'mute' => true, // mutes the console output from $this->outputSuccess('foobar');
			'controllerMap' => [
				'fix' => 'gmf\FixController',
			],
		];
	}
	
	public function testRunController()
	{
		$run = $this->app->runAction('fix', ['tests/files/', 'dry' => true]);
		$this->assertSame(0, $run);
	}
	
	public function testObject()
	{
		$ctrl = new FixController('fix', $this->app);
		
		$content = $ctrl->getFileContent('tests/files/tabs.md');
		$this->assertSame('    Tabs', $ctrl->parseContent($content));
		
		$content = $ctrl->getFileContent('tests/files/breakingspace.md');
		$this->assertSame('# Space', $ctrl->parseContent($content));
	}
}