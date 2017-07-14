.. include:: ../Includes.txt


.. _configuration:

Configuration
====================

There is currently only one configuration option available:

Within the extension manager you can set *backend.rootTemplatePath* to the path were your templates
are stored. If this configuration parameter is set then an additional file loader is registered
that will search for the templates in the given directory.

Instead of writing *EXT:my_extension/Resources/Private/Templates/my_template.html.twig* you can set
*backend.rootTemplatePath* to *EXT:my_extension/Resources/Private/Templates/* than you are able to
reference your templates by just writing */my_template.html.twig*.
