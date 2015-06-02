# BranchingBundle

Symfony BranchingBundle. Auto change database depends on еру current git branch.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e0649e62-91e7-497c-8008-cf7aba6d0ee9/big.png)](https://insight.sensiolabs.com/projects/e0649e62-91e7-497c-8008-cf7aba6d0ee9)

Bundle version is connected with supported symfony version.

## Installation

Download bundle by composer

```
composer require therat/branching "2.6.*"
```

Then, enable the bundle by adding the following line in the app/AppKernel.php file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new TheRat\BranchingBundle\TheRatBranchingBundle(),
        );

        // ...
    }

    // ...
}
```
