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

namespace Comwrap\Typo3\TwigForTypo3\Hook;

use Comwrap\Typo3\TwigForTypo3\Twig\Environment;
use Symfony\Component\Filesystem\Filesystem;
use TYPO3\CMS\Core\SingletonInterface;

/**
 * This hook will purge Twig’s template cache when TYPO3’s cache is cleared.
 *
 * @internal Don’t reference this class outside this package.
 *   This class might be changed or removed at any time.
 */
class DataHandler implements SingletonInterface
{
    public function clearTwigCache(array $parameters)
    {
        if ($parameters['cacheCmd'] === 'pages') {
            return;
        }

        (new Filesystem())->remove(Environment::getCacheDirectory());
    }
}
