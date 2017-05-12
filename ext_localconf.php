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

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc']['t3twig'] =
    \Comwrap\Typo3\TwigForTypo3\Hook\DataHandler::class.'->clearTwigCache';

$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = \array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], [
    'TWIG' => Comwrap\Typo3\TwigForTypo3\ContentObject\TwigTemplateContentObject::class,
]);
