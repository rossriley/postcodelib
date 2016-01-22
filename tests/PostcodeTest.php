<?php

namespace Postcodelib\Tests;

use Postcodelib\Postcode;
use IM\Dotmailer\Service\Contact;

/**
 * Class ApiTest
 * @author Ross Riley <riley.ross@gmail.com>
 * Test data courtesy of https://github.com/ideal-postcodes/postcode.js
 */
class PostcodeTest extends \PHPUnit_Framework_TestCase
{

    public function getTestData($type)
    {
        return json_decode(file_get_contents(__DIR__.'/data/'.$type.'.json'), true);
    }

    public function testValidation()
    {
        $data = $this->getTestData('validation');
        foreach ($data['tests'] as $test) {
            $pc = new Postcode($test['base']);
            $expected = ($test['expected']) ? true : false;
            $this->assertEquals($expected, $pc->valid(), $pc->postcode());
        }
    }

    public function testNormalisation()
    {
        $data = $this->getTestData('normalisation');
        foreach ($data['tests'] as $test) {
            $pc = new Postcode($test['base']);
            $expected = ($test['expected']) ? true : false;
            $this->assertEquals($expected, $pc->valid(), $pc->postcode());
        }
    }
}
