<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class createNotesTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @group create
     */
    public function testCreateNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url: '/')
                    ->assertSee(text: 'Log in')
                    ->clickLink(link: 'Log in')
                    ->assertPathIs(path: '/login')
                    ->type(field: 'email', value: 'admin@example.com')
                    ->type(field: 'password', value: 'password')
                    ->press(button: 'LOG IN')
                    ->assertPathIs(path: '/dashboard')
                    ->assertSee(text: 'Notes') // Memastikan tombol "Notes" ada
                    ->clickLink(link: 'Notes') // Mengklik tombol "Notes"
                    ->assertPathIs(path: '/notes') // Memastikan URL setelah mengklik tombol "Notes"
                    ->assertSee(text: 'Create Notes') // Memastikan tombol "Create Notes" ada
                    ->clickLink(link: 'Create Notes') // Mengklik tombol "Create Notes"
                    ->assertPathIs(path: '/create-notes') // Memastikan URL setelah mengklik tombol "Create Notes"
                    ->type(field: 'title', value: 'Judul Notes') // Mengisi input yang beratribut name title
                    ->type(field: 'description', value: 'Deskripsi Notes') // Mengisi input yang beratribut name description
                    ->press(button: 'Create') // Menekan tombol submit (Create)
                    ->assertPathIs(path: '/notes'); // Memastikan URL setelah menekan tombol submit
        });
    }
}
