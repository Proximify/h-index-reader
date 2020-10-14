<?php

namespace Proximify\HIndexReader;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
    const LIBRARY_PATH = __DIR__ . '/python/_gscholar.py ';

    function __construct() 
    {

    }

    function queryHIndex($q)
    {
        return shell_exec('python3 ' .  self::LIBRARY_PATH . "--q '$q'");
    }

    function getHIndexByAuthorId($id)
    {        
        return shell_exec('python3 ' .  self::LIBRARY_PATH . '--id ' . $id);
    }
}