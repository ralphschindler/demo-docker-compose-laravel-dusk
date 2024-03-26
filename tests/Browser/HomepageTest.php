<?php

namespace Tests\Browser;

use Database\Seeders\TestingSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->seed(TestingSeeder::class);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('test@example.com')
                ->assertSee('Testing User');
        });
    }
}
