<?php

/**
 * Test file for the h-index.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   https://opensource.org/licenses/GPL-3.0 GNU GPL 3.0
 * @version   1.0
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Proximify\HIndexReader;

$hindex = new HIndexReader\HIndexReader();
echo $hindex->queryHIndex('Diana Inkpen, University of Ottawa (Computer Science)');

// echo $hindex->getHIndexByAuthorId('avUYKIgAAAAJ');


// echo $hindex->getHIndexBatch();