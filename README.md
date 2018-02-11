### Testing
 1. `php artisan migrate:fresh --database testing`
 2. `./vendor/bin/phpunit` - Setup a new fresh migration, and use 
 database transactions for blazing speed. For PHPStorm, remember to
 use the phpunit.xml configuration in your test suites.
 
 > Remember to re-run first step when making changes to migrations.
 Although cumbersome, it's worth the ~1.5 seconds of speed we gain 
 for each of the hundred of tests run cycles.
