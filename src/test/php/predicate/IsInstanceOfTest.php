<?php
/**
 * This file is part of bovigo\assert.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bovigo\assert\predicate;
use function bovigo\assert\assert;
/**
 * Tests for bovigo\assert\predicate\IsInstanceOf.
 *
 * @group  predicate
 */
class IsInstanceOfTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException  InvalidArgumentException
     */
    public function throwsInvalidArgumentExceptionWhenGivenExpectedTypeIsNoString()
    {
        isInstanceOf(303);
    }
    
    /**
     * @test
     * @expectedException  InvalidArgumentException
     */
    public function throwsInvalidArgumentExceptionWhenGivenExpectedTypeIsUnknown()
    {
        isInstanceOf('DoesNotExist');
    }

    /**
     * @test
     */
    public function evaluatesToTrueIfGivenValueIsInstanceOfExpectedType()
    {
        assert(isInstanceOf(__CLASS__)->test($this), isTrue());
    }

    /**
     * @test
     */
    public function evaluatesToFalseIfGivenValueIsNotInstanceOfExpectedType()
    {
        assert(isInstanceOf('\stdClass')->test($this), isFalse());
    }
}