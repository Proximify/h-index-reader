<?php

namespace Proximify\HIndexReader;

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
    const LIBRARY_PATH = __DIR__ . '/python/_gscholar.py';

    function __construct() 
    {

    }

    function queryHIndex($q)
    {
        $process = new Process(['python3', self::LIBRARY_PATH, '--q', $q]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }

    function getHIndexByAuthorId($id)
    {
        $process = new Process(['python3', self::LIBRARY_PATH, '--id', $id]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}