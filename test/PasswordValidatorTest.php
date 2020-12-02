<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/passwordValidator.php';

use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    /**
     * @test
     */
    function check_a_password_is_valid()
    {
        // given
        $passwordDefinition = '1-3 a: abcde';
        // then
        $this->assertTrue(isPasswordValid($passwordDefinition));

        // given
        $passwordDefinition = '1-3 b: cdefg';
        // then
        $this->assertFalse(isPasswordValid($passwordDefinition));

        // given
        $passwordDefinition = '2-9 c: ccccccccc';
        // then
        $this->assertTrue(isPasswordValid($passwordDefinition));
    }
}