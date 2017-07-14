<?php

use Comwrap\Typo3\TwigForTypo3\Mvc\View\TwigView;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;

class TwigViewTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = [
        'typo3conf/ext/twig_for_typo3'
    ];

    public function test_twig_view_renders_template()
    {
        $twigView = new TwigView();
        $twigView->assign('foo', 'bar');
        $twigView->setTemplatePathAndFilename('EXT:twig_for_typo3/Resources/Private/template.html.twig');

        $renderedView = $twigView->render();
        $expectedOutput = <<<HTML
<h1>Hello bar!</h1>
<p style="color: red">
     This template is rendered using the twig template engine.
</p>

HTML;

        $this->assertSame($expectedOutput, $renderedView);
    }
}
