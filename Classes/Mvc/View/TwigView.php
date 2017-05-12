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

namespace Comwrap\Typo3\TwigForTypo3\Mvc\View;

use Comwrap\Typo3\TwigForTypo3\Twig\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\View\AbstractView;

class TwigView extends AbstractView
{
    /**
     * @var \Comwrap\Typo3\TwigForTypo3\Twig\Environment
     */
    private $twigEnvironment;

    /**
     * @var string
     */
    private $templateName;

    public function __construct()
    {
        $this->twigEnvironment = GeneralUtility::makeInstance(Environment::class);
    }

    public function render()
    {
        return $this->twigEnvironment->render($this->templateName, $this->variables);
    }

    public function setTemplatePathAndFilename(string $templateName)
    {
        $this->templateName = $templateName;
    }
}
