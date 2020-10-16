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

class DependencyInstaller
{
    function installDependencies() {
        print('Installing dependencies.');
        $output = exec('pip3 install scholarly --user && pip3 install argparse --user');
        print($output);
    }
}