<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @group login
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser):void {
            $browser->visit(url: '/') //Untuk mengunjungi halaman utama web
                    ->assertSee(text: 'Log in')//Untuk memeriksa apakah halaman utama web menampilkan teks "Login"
                    ->clickLink(link: 'Log in')//Untuk mengklik link "Login" di halaman utama web
                    ->assertPathIs(path: '/login')//Untuk memastikan url setelah menekan link Login
                    ->type(field: 'email', value: 'admin@example.com')//Untuk mengisi input yang beratribut name email
                    ->type(field: 'password', value: 'password')//Untuk mengisi input yang beratribut name password
                    ->press(button: 'LOG-IN');//Untuk menekan tombol submit (login)
                    //->assertPathIs(path: '/dashboard'); //Untuk memastikan url setelah menekan tombol submit
        });
    }
}
