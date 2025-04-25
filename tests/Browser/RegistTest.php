<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @group register
     */
    public function testRegister(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url: '/')// Untuk mengunjungi halaman utama web
                    ->assertSee(text: 'Register')// Untuk memeriksa apakah halaman utama web menampilkan teks "Register"
                    ->clickLink(link: 'Register')// Untuk mengklik link "Register" di halaman utama web
                    ->assertPathIs(path: '/register')// Untuk memastikan url setelah menekan link Register
                    ->type(field: 'name', value: 'admin')// Untuk mengisi input yang beratribut name name
                    ->type(field: 'email', value: 'admin@example.com')// Untuk mengisi input yang beratribut name email
                    ->type(field: 'password', value: 'password')// Untuk mengisi input yang beratribut name password
                    ->type(field: 'password_confirmation', value: 'password')// Untuk mengisi input yang beratribut name confirm_password
                    ->press(button: 'REGISTER') //Untuk menekan tombol submit (register)
                    ->assertPathIs(path: '/dashboard'); // Untuk memastikan url setelah menekan tombol submit
        });
    }
}
