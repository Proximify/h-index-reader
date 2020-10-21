<?php

/**
 * Test file for the h-index.
 *
 * @author    Proximify Inc <support@proximify.com>
 * @copyright Copyright (c) 2020, Proximify Inc
 * @license   https://opensource.org/licenses/GPL-3.0 GNU GPL 3.0
 * @version   1.0
 */
const VENDOR_DIR = '';

if (empty(VENDOR_DIR))
{
    print('Please set the path of vendor directory.');
    exit();
}

if (file_exists(VENDOR_DIR))
    require_once(VENDOR_DIR . '/autoload.php');
else
    exit();

use Proximify\HIndexReader;

$action = $_GET['action'];

switch ($action) {
    case 'readFromJson':
        $output = readFromJson();
        break;
    case 'getHIndexByName':
        $output = getHIndexByName();
        break;
    case 'getHIndexByNameAndAffiliation':
        $output = getHIndexByNameAndAffiliation();
        break;
    default:
        throw new Exception('Invalid action: ' . $action);
}

echo json_encode($output);

function readFromJson() {
    $people = json_decode(file_get_contents('../../dummyData.json'), true);
    $hindexReader = new HIndexReader\HIndexReader();
    $res = $hindexReader->queryHIndex($people);

    return $res;
}

function getHIndexByName() {
    $data = $_GET['data'];
    $hindexReader = new HIndexReader\HIndexReader();
    $res = $hindexReader->queryHIndex($data);

    return $res;
}

function getHIndexByNameAndAffiliation() {
    $data = $_GET['data'];
    $hindexReader = new HIndexReader\HIndexReader();
    $res = $hindexReader->queryHIndex($data);

    return $res;
}
