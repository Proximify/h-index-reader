<?php

namespace Proximify\HindexReader;

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
    public $defaultSource = 'gscholar';

    function __construct() 
    {
    }

    function queryHIndex($q) {
        $gscholar = new GoogleScholar();

        return $gscholar->queryHIndex($q);
    }

    function getHIndexByAuthorId($id)
    {
        $gscholar = new GoogleScholar();
        
        return $gscholar->getHIndexByAuthorId($id);
    }
}