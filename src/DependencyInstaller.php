<?php

namespace Proximify\HIndexReader;

/**
 * File for class DependencyInstaller.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   https://opensource.org/licenses/GPL-3.0 GNU GPL 3.0
 * @version   1.0.0 GLOT Run Time Library
 */

class DependencyInstaller extends \Proximify\ForeignPackages
{
    function checkDependencies() {
        printf('Checking dependencies.');
        $output = $this->findApp('python3');

        if(empty($output))
            print('You need Python 3 or later in your system to run this package.');

        $output = $this->findApp('pip3');

        if(empty($output))
            print('You need pip3 or later in your system to run this package.');
    }
}
