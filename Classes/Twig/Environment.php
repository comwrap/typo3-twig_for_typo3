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

namespace Comwrap\Typo3\TwigForTypo3\Twig;

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Environment extends \Twig_Environment implements SingletonInterface
{
    public function __construct()
    {
        $loader = new \Twig_Loader_Chain($this->getAdditionalLoaders());
        $loader->addLoader(new Typo3Loader());

        parent::__construct($loader, [
            'cache' => static::getCacheDirectory(),
            'debug' => $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'],
        ]);

        if ($this->isDebug()) {
            $this->addExtension(new \Twig_Extension_Debug());
        }
    }

    /**
     * Returns the path to the twig cache directory.
     *
     * @return string
     */
    public static function getCacheDirectory(): string
    {
        return PATH_site.'typo3temp/var/Cache/Code/twig';
    }

    /**
     * @return array|\Twig_LoaderInterface[]
     */
    private function getAdditionalLoaders(): array
    {
        if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['twig_for_typo3']['twig']['loader'])) {
            return \array_map(function (string $loaderClass) {
                return GeneralUtility::makeInstance($loaderClass);
            }, $GLOBALS['TYPO3_CONF_VARS']['EXT']['twig_for_typo3']['twig']['loader']);
        }

        return [];
    }
}
