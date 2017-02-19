<?php

namespace Tests\Browser;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BooksCrudTest extends DuskTestCase
{

    /**
     * @test
     */
    public function I_can_create_a_new_book()
    {
        /** @var Book $book */
        $book = factory(Book::class)->make();
        $author = factory(Author::class)->create();

        $this->browse(function (Browser $browser) use ($book, $author) {

            $browser->visit('/books/create')
                ->type('title', $book->title)
                ->type('subtitle', $book->subtitle)
                ->type('isbn', $book->isbn)
                ->press('Save')
                ->assertPathIs('/books');
        });

        $this->assertDatabaseHas('books', $book->toArray());
    }


    /**
     * @test
     */
    public function I_can_edit_a_book()
    {
        /** @var Book $book */
        $book = factory(Book::class)->create();
        $newDataForBook = ['title' => 'Harry Potter' . str_random(), 'subtitle' => 'lorem ipsum...', 'isbn' => mt_rand(999, 999999)];

        $this->browse(function (Browser $browser) use ($book, $newDataForBook) {

            $browser->visit(route('books.edit', $book->id))
                ->type('title', $newDataForBook['title'])
                ->type('subtitle', $newDataForBook['subtitle'])
                ->type('isbn', $newDataForBook['isbn'])
                ->press('Save')
                ->assertPathIs('/books');
        });

        $this->assertDatabaseHas('books', $newDataForBook);
        $this->assertDatabaseMissing('books', $book->toArray());
    }


    /**
     * @test
     */
    public function I_can_see_books_list()
    {
        $books = factory(Book::class)->times(20)->create();
        $this->browse(function (Browser $browser) use ($books) {
            $browser->visit(route('books.index'));

            foreach ($books as $book) {
                $browser->assertSee($book->title);
            }

        });
    }


    /**
     * @test
     */
    public function I_can_delete_book()
    {
        $book = factory(Book::class)->create();

        $this->browse(function (Browser $browser) use ($book) {
            $browser->visit(route('books.index'))
                ->press('Remove')
                ->assertPathIs('/books');
        });

        $this->assertDatabaseMissing('books', $book->toArray());
    }


    /**
     * @test
     */
    public function I_can_visit_single_book_page()
    {
        $book = factory(Book::class)->create();

        $this->browse(function (Browser $browser) use ($book) {
            $browser->visit(route('books.index'))
                ->clickLink('Go to this book')
                ->assertPathIs('/books/'. $book->id)
                ->assertSee($book->title);
        });

    }


}
