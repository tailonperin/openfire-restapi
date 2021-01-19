<?php

namespace Tailonperin\OpenfireRestapi\Tests;

use Orchestra\Testbench\TestCase;
use Tailonperin\OpenfireRestapi\OpenfireRestapiServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [OpenfireRestapiServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
