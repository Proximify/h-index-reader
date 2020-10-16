<?php

namespace Proximify\HIndexReader;

use \Exception;

/**
 * A class that allows you to retrieve author's h-index information from 
 * different sources including Google Scholar.
 *
 * @author Mert Metin <mert@proximify.ca>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   MIT
 * @version   1.0 UNIWeb Module
 */

class HIndexReader
{
    const SETTINGS_FILE = '../settings/HIndexReader.json';

    /**
     * @var @service Service used to fetch h-indicies.
     */
    public $service;

    /**
     * @var @settings Component settings.
     */
    public $settings;

    /**
     * @var @options Component options.
     */
    public $options;


    /**
    * C'tor
    * @param $options Component options.
    */
    function __construct($options = []) 
    {
        $this->settings = $this->getSettings();
        $this->service = new GoogleScholar();
    }

    /**
     * Returns the list of settings under the settings/HIndexReader.json.
     * 
     * @return string 
     */
    function getSettings()
    {
        return json_decode(file_get_contents(getcwd() . '/../../' . self::SETTINGS_FILE), true);
    }

    /**
     * Parses GoogleScholar URL and returns profile ID of user.
     * 
     * @param string $profileUrl GoogleScholar profile URL (e.g. https://scholar.google.com/citations?hl=en&user=SDlCXgwAAAAJ)
     * @return string $profileId GoogleScholara profile ID
     */
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

    /**
     * Retrieves author(s) h-indicides based on their name, 
     * affiliation and/or GoogleScholar Profile URL.
     * 
     * @param array $people List of people to fetch h-indices.
     * @return array $indices List of people with their h-indicies.
     */
    function queryHIndex($people = NULL) {

        if (empty($people))
            $people = $this->settings['people'];

        $indices  = [];

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

    function abc() {
        return 'asd';
    }
}