# Twig for TYPO3

[![Build Status](https://travis-ci.org/comwrap/typo3-twig_for_typo3.svg?branch=master)](https://travis-ci.org/comwrap/typo3-twig_for_typo3)

This TYPO3 extension integrates the Twig template engine.

## Installation

This extension is not considered stable yet. We are working on a first stable release that will be also available in 
the [TYPO3 Extension Repository (TER)](https://typo3.org/extensions/repository/).

You can use composer to install the extension. If you are not familiar using composer together with TYPO3 CMS you can 
find a [how to on the TYPO3 website](https://composer.typo3.org/).

Install the extension with the following composer command:

```
composer require comwrap/typo3-twig_for_typo3 dev-master
```

## Basic Usage

You can render Twig templates the exact same way you would render Fluid templates using TypoScript.

See the example below to see how to render a simple text on the page.

```typo3_typoscript
page.10 = TWIG
page.10 {
    variables {
        foo = TEXT
        foo.value = BAZ!
    }
    template = EXT:twig_for_typo3/Resources/Private/template.html.twig
}
```

You can add own root storage path for templates if you need in ext_conf_template settings. Templates and its partials
should be stored at this folder and all paths start according to it.

```
{% include "/foo/template.html.twig" %}
```

```
 template = /foo/template.html.twig
```

## Custom loader

If you have a self written loader to retrieve templates you can register a custom loader:

```php
$GLOBALS['TYPO3_CONF_VARS']['EXT']['twig_for_typo3']['twig']['loader'][] = MyLoader::class;
```

The loader will be instantiated using the `GeneralUtility` class.

Custom loaders take precedence over the build in `Typo3Loader`.

## Twig in Extbase controllers

You can also use Twig templates for your Extbase controller actions:

```php
<?php 

class MyAwesomeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController 
{
    // setting the default view object class to TwigView will enable the Twig templates 
    protected $defaultViewObjectName = \Comwrap\Typo3\TwigForTypo3\Mvc\View\TwigView::class;
    
    public function contentelementAction()
    {
        $this->view->setTemplatePathAndFilename('EXT:twig_for_typo3/Resources/Private/template.html.twig');
        $this->view->assign('foo', 'BAZ!');
    }
}
```
