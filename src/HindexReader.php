<?php

namespace Proximify\HindexReader;

require_once __DIR__ . '/../vendor/autoload.php';

use \Exception;

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
    const CONFIG_FILE = '../settings/config.json';

    public $service;

    function __construct($service = 'gscholar') 
    {
        if ($service == 'gscholar')
            $this->service = new GoogleScholar();
        else {
            throw new Exception('Invalid service: ' . $service);
        }
    }
    function queryHIndex($q) {
        return $this->service->queryHIndex($q);
    }

    function getHIndexByAuthorId($id) {        
        return $this->service->getHIndexByAuthorId($id);
    }

    function getHIndexBatch() {
        $config = $this->getConfig();
        $batchFilePath = $config['batchFilePath'];
        $base = __DIR__ . '/../';
        $authors = json_decode(file_get_contents($base . $batchFilePath), true);
        $indicies = '';
        
        foreach ($authors as $author)
        {
            if (empty($author['id'])) {
                
                if (empty($author['name']))
                    return;

                $q = $author['name'];

                if ($author['affiliation'])
                    $q = $q . ', ' . $author['affiliation'];

                echo $q;

                $indicies .= $this->service->queryHIndex($q);

            } else {
                $indicies .= $this->service->getHIndexByAuthorId($author['id']);
            }
        }

        $outputFilePath = $base . $config['batchOutputFilePath'];

        file_put_contents($outputFilePath, $indicies);
    } 

    function getConfig($key = NULL) {
        if (!file_exists(self::CONFIG_FILE))
            throw new exception('The file does not exist.');    
    
        $contents = json_decode(file_get_contents(self::CONFIG_FILE), true);

        if (isset($key))
            return $contents[$key];

        return $contents;
    }
}