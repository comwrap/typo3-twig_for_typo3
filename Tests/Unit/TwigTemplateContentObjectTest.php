<?php

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
