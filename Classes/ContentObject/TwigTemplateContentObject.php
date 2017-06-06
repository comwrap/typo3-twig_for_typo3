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

namespace Comwrap\Typo3\TwigForTypo3\ContentObject;

use Comwrap\Typo3\TwigForTypo3\Twig\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\AbstractContentObject;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * @internal
 */
class TwigTemplateContentObject extends AbstractContentObject
{
    /**
     * @var Environment
     */
    private $twigEnvironment;

    public function __construct(ContentObjectRenderer $cObj)
    {
        parent::__construct($cObj);
        $this->twigEnvironment = GeneralUtility::makeInstance(Environment::class);
    }

    public function render($conf = [])
    {
        if (!isset($conf['template'])) {
            throw new \Exception('Template file missing.', 1494532943);
        }

        $variables = $this->getContentObjectVariables($conf);

        return $this->twigEnvironment->render($conf['template'], $variables);
    }

    private function getContentObjectVariables(array $conf): array
    {
        $variables = [];
        $reservedVariables = ['data', 'current'];

        // Accumulate the variables to be process and loop them through cObjGetSingle
        $variablesToProcess = (array) $conf['variables.'];
        foreach ($variablesToProcess as $variableName => $cObjType) {
            if (\is_array($cObjType)) {
                continue;
            }
            if (!\in_array($variableName, $reservedVariables)) {
                $variables[$variableName] = $this->cObj->cObjGetSingle($cObjType, $variablesToProcess[$variableName.'.']);
            } else {
                throw new \InvalidArgumentException(
                    'Cannot use reserved name "'.$variableName.'" as variable name in TWIGTEMPLATE.',
                    1288095720
                );
            }
        }

        $variables['data'] = $this->cObj->data;
        $variables['current'] = $this->cObj->data[$this->cObj->currentValKey];

        return $variables;
    }
}
