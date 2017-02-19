## Test task

This is quite simple app about books and authors.
To install it you need just:
- clone this project
- install dependencies via composer
- run database migrations
- specify testing database in .env.dusk.local
- run tests by command 
`php artisan dusk`.
I've used only Laravel Dusk here.
You can find more info about it [here](https://laravel.com/docs/5.4/dusk). 

if everything OK, you should see something like this
 
```
...........  11 / 11 (100%)

Time: 12.41 seconds, Memory: 16.00MB

OK (11 tests, 59 assertions)
````