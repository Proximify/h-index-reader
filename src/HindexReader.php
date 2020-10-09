<?php

namespace Proximify\HindexReader;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * File for class HindexReader.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   MIT
 * @version   1.0 UNIWeb Module
 */

class HindexReader
{
    function __construct() {}

    function getHindex($name) {
        $process = new Process(['python3', 'python/_scholarly.py', $name]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}

$hindex = new HindexReader();
$hindex->getHindex('Steven A Cholewiak');
