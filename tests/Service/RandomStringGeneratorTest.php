<?php


namespace App\Tests\Service;


use App\Service\RandomStringGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringGeneratorTest extends TestCase
{
    public function testRandomStringGenerator()
    {
        $randomStringGenerator = new RandomStringGenerator();
        $oneCharacterString = $randomStringGenerator->generate(1);
        $nineCharacterString = $randomStringGenerator->generate(9);
        $this->assertTrue(ctype_alnum($oneCharacterString));
        $this->assertTrue(ctype_alnum($nineCharacterString));
        $this->assertEquals(1, strlen($oneCharacterString));
        $this->assertEquals(9, strlen($nineCharacterString));
    }
}