# monolog-tracy-bar-dump-handler

Monolog handler that logs to Tracy's barDump method.

## Development Testing with Composer

Run the following commands on the application you want to test this composer package on:

```
# If monolog-tracy-bar-dump-handler is already installed, remove it first.
composer remove srt4rulez/monolog-tracy-bar-dump-handler

# Configures this repo to be setup in composer, assuming its in directory /opt/www
composer config repositories.srt4rulez/monolog-tracy-bar-dump-handler path /opt/www/monolog-tracy-bar-dump-handler

# require our composer repo, but with "@dev" - which will create a symlink to this repo.
composer require srt4rulez/monolog-tracy-bar-dump-handler @dev
```

You can now make changes to this repo while using it as composer package in another git repo!

NOTE: Make sure you don't commit these changes to your git repo. 
