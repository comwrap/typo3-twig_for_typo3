<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Comwrap\Typo3\TwigForTypo3\Mvc\View\TwigView;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;

class TwigViewTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = [
        'typo3conf/ext/twig_for_typo3',
    ];

    public function test_twig_view_renders_template()
    {
        $twigView = new TwigView();
        $twigView->assign('foo', 'bar');
        $twigView->setTemplatePathAndFilename('EXT:twig_for_typo3/Resources/Private/template.html.twig');

        $renderedView = $twigView->render();
        $expectedOutput = <<<'HTML'
<h1>Hello bar!</h1>
<p style="color: red">
     This template is rendered using the twig template engine.
</p>

HTML;

        $this->assertSame($expectedOutput, $renderedView);
    }
}
