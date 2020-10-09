<?php

namespace Proximify\HindexReader;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * File for class GoogleScholar.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   MIT
 * @version   1.0 UNIWeb Module
 */

class GoogleScholar
{
    const LIBRARIES = ['scholarly'];

    function __construct() 
    {

    }

    function getHindex($q)
    {
        $path = __DIR__ . '/python/_';
        $process = new Process(['python3', $path . self::LIBRARIES[0] . '.py', $q]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}