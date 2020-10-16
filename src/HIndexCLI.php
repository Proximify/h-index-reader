<?php

namespace Proximify\HIndexReader;

/**
 * File for class HIndexCLI.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   https://opensource.org/licenses/GPL-3.0 GNU GPL 3.0
 * @version   1.0.0 GLOT Run Time Library
 */

/**
 * 
 * Extend the base class in order to add an additional 
 * location for the settings folder.
 */
class HIndexCLI extends \Proximify\CLIActions
{
    /**
     * @inheritDoc
     */
    static public function getSettingsFolder(): string
    {
        return  (__DIR__) . '/settings/cli';
    }
}