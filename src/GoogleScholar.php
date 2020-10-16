<?php

namespace Proximify\HIndexReader;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * File for class GoogleScholar.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   MIT
 * @version   1.0 UNIWeb Module
 */

require_once('libraries/gscholar/Scholarly.php');

class GoogleScholar
{
    function __construct() {
        $this->service = new Scholarly();
    }

    function queryHIndex($q)
    {
        return $this->service->queryHIndex($q);
    }

    function queryHIndexById($id)
    {        
        return $this->service->queryHIndexById($id);
    }
}