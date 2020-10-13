<?php

namespace Proximify\HIndexReader;

require_once __DIR__ . '/../vendor/autoload.php';

use \Exception;

/**
 * File for class HIndexReader.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   MIT
 * @version   1.0 UNIWeb Module
 */

class HIndexReader
{
    const SETTINGS_FILE = '../settings/HIndexReader.json';

    public $service;
    public $settings;
    public $options;

    function __construct($options = []) 
    {
        // $this->settings = $this->getSettings();
        $this->service = new GoogleScholar();
    }

    function getSettings()
    {
        return json_decode(file_get_contents(getcwd() . '/' . self::SETTINGS_FILE), true);
    }

    function parseProfileUrl($profileUrl)
    {
        if (filter_var($profileUrl, FILTER_VALIDATE_URL) === FALSE) 
            return;

        $urlParts = explode('user=', $profileUrl);

        if (empty($urlParts[1]))
            return;

        $profileId = $urlParts[1];

        return $profileId;
    }

    function queryHIndex($people = NULL) {

        if (empty($people))
            $people = $this->settings['people'];

        foreach ($people as $person)
        {
            if (empty($person['profile_url']))
            {
                if (empty($person['name']))
                    return;

                $q = $person['name'];

                if (isset($person['affiliation']))
                    $q = $q . ', ' . $person['affiliation'];

                $res = $this->service->queryHIndex($q);

                if (!$res)
                    return;

                $indices []= $res;
            }
            else
            {
                $profileUrl = $person['profile_url'];
                $profileId = $this->parseProfileURL($profileUrl);

                if (!$profileId)
                    return;

                $res = $this->service->getHIndexByAuthorId($profileId);

                $indices []= $res;
            }
        }

        return $indices;
    }
}