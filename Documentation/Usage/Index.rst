.. include:: ../Includes.txt


.. _usage:

Usage
=====

.. _developer-hooks:

Render templates in TypoScript
------------------------------

You can render Twig templates the exact same way you would render Fluid templates using TypoScript.

See the example below to see how to render a simple text on the page.

.. code-block:: typoscript

	page.10 = TWIG
	page.10 {
		variables {
			foo = TEXT
			foo.value = BAZ!
		}
		template = EXT:twig_for_typo3/Resources/Private/template.html.twig
	}

Render templates in an Extbase controller
-----------------------------------------

You can also use Twig templates for your Extbase controller actions:

.. code-block:: php

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

Add your own custom template loader
-----------------------------------

If you have a self written loader to retrieve templates you can register a custom loader:

.. code-block:: php

	$GLOBALS['TYPO3_CONF_VARS']['EXT']['twig_for_typo3']['twig']['loader'][] = MyLoader::class;

The loader will be instantiated using the *GeneralUtility* class.

Custom loaders take precedence over the build in *Typo3Loader*.
