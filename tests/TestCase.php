<?php

namespace Akunbeben\FortifyRole\Tests;

use Akunbeben\FortifyRole\FortifyRoleServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            FortifyRoleServiceProvider::class,
        ];
    }
}