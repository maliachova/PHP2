<?php

/**
 * Test cases for project euler.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem1.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem2.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem3.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem4.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem5.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem6.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem7.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem8.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem9.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem10.php';
require_once __DIR__ . '/../../Maths/ProjectEuler/Problem11.php';

/**
 * Test cases for project euler.
 */
class ProjectEulerTest extends TestCase
{
    /**
     * Test problem1.
     *
     * @return void
     */
    public function testProblem1(): void
    {
        $this->assertSame(233168, problem1a());
        $this->assertSame(233168, problem1b());
    }

    /**
     * Test problem2.
     *
     * @return void
     */
    public function testProblem2(): void
    {
        $this->assertSame(4613732, problem2());
    }

    /**
     * Test problem3.
     *
     * @return void
     */
    public function testProblem3(): void
    {
        $this->assertSame(6857, problem3());
    }

    /**
     * Test problem4.
     *
     * @return void
     */
    public function testProblem4(): void
    {
        $this->assertSame(906609, problem4());
    }

    /**
     * Test problem5.
     *
     * @return void
     */
    public function testProblem5(): void
    {
        $this->assertSame(232792560, problem5());
    }

    /**
     * Test problem6.
     *
     * @return void
     */
    public function testProblem6(): void
    {
        $this->assertSame(25164150, problem6());
    }

    /**
     * Test problem7.
     *
     * @return void
     */
    public function testProblem7(): void
    {
        $this->assertSame(104743, problem7());
    }

    /**
     * Test problem8.
     *
     * @return void
     */
    public function testProblem8(): void
    {
        $this->assertSame(23514624000, problem8());
    }

    /**
     * Test problem9.
     *
     * @return void
     */
    public function testProblem9(): void
    {
        $this->assertSame(31875000, problem9());
    }

    /**
     * Test problem10.
     *
     * @return void
     */
    public function testProblem10(): void
    {
        $this->assertSame(142913828922, problem10());
    }

    /**
     * Test problem11.
     *
     * @return void
     */
    public function testProblem11(): void
    {
        $this->assertSame(70600674, problem11());
    }
}
