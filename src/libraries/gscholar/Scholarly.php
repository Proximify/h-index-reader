<?php

namespace Proximify\HIndexReader;

/**
 * Wrapper class for Python's scholarly package.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   https://opensource.org/licenses/GPL-3.0 GNU GPL 3.0
 * @version   1.0.0 GLOT Run Time Library
 */

class Scholarly
{
    function __construct() {}

    const LIBRARY_PATH = __DIR__ . '/../../python3/_scholarly/';

    function queryHIndex($q)
    {
        return shell_exec('python3 ' .  self::LIBRARY_PATH . __FUNCTION__ . '.py ' . "'$q'");
    }

    function queryHIndexById($profileId)
    {
        return shell_exec('python3 ' .  self::LIBRARY_PATH . __FUNCTION__ . '.py ' . $profileId);
    }
}