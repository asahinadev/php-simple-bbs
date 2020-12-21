<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UserMailerComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UserMailerComponent Test Case
 */
class UserMailerComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\UserMailerComponent
     */
    protected $UserMailer;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->UserMailer = new UserMailerComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserMailer);

        parent::tearDown();
    }
}
