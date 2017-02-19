<?php

namespace Tests\Browser;

use App\Models\Author;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthorsCrudTest extends DuskTestCase
{

    /**
     * @test
     */
    public function I_can_create_a_new_author()
    {
        /** @var Author $author */
        $author = factory(Author::class)->make();

        $this->browse(function (Browser $browser) use ($author) {

            $browser->visit('/authors/create')
                ->type('name', $author->name)
                ->press('Save')
                ->assertPathIs('/authors');
        });

        $this->assertDatabaseHas('authors', $author->toArray());
    }


    /**
     * @test
     */
    public function I_can_edit_a_author()
    {
        /** @var Author $author */
        $author = factory(Author::class)->create();
        $newDataForAuthor = ['name' => 'New author name'];

        $this->browse(function (Browser $browser) use ($author, $newDataForAuthor) {

            $browser->visit(route('authors.edit', $author->id))
                ->type('name', $newDataForAuthor['name'])
                ->press('Save')
                ->assertPathIs('/authors');
        });

        $this->assertDatabaseHas('authors', $newDataForAuthor);
        $this->assertDatabaseMissing('authors', $author->toArray());
    }


    /**
     * @test
     */
    public function I_can_see_authors_list()
    {
        $authors = factory(Author::class)->times(20)->create();

        $this->browse(function (Browser $browser) use ($authors) {
            $browser->visit(route('authors.index'));

            foreach ($authors as $author) {
                $browser->assertSee($author->name);
            }

        });
    }


    /**
     * @test
     */
    public function I_can_delete_an_author()
    {
        $author = factory(Author::class)->create();

        $this->browse(function (Browser $browser) use ($author) {
            $browser->visit(route('authors.index'))
                ->press('Remove')
                ->assertPathIs('/authors');
        });

        $this->assertDatabaseMissing('authors', $author->toArray());
    }


    /**
     * @test
     */
    public function I_can_visit_single_author_page()
    {
        $author = factory(Author::class)->create();

        $this->browse(function (Browser $browser) use ($author) {
            $browser->visit(route('authors.index'))
                ->clickLink('Go to this author')
                ->assertPathIs('/authors/'. $author->id)
                ->assertSee($author->name);
        });

    }


}
