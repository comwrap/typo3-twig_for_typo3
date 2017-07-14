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

use Nimut\TestingFramework\TestCase\UnitTestCase;

class TwigTemplateContentObjectTest extends UnitTestCase
{
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Template file missing.
     * @expectedExceptionCode 1494532943
     */
    public function test_exception_is_thrown_if_template_is_missing()
    {
        $cObjProphesize = $this->prophesize(
            \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::class
        );

        $twigTemplateContentObject = new \Comwrap\Typo3\TwigForTypo3\ContentObject\TwigTemplateContentObject(
            $cObjProphesize->reveal()
        );
        $twigTemplateContentObject->render();
    }
}
