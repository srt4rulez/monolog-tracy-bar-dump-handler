# monolog-tracy-bar-dump-handler

Monolog handler that logs to Tracy's barDump method.

## Getting Started

Install via composer:

```
composer require srt4rulez/monolog-tracy-bar-dump-handler
```

Then, add the handler to your monolog logger:

```php
<?php

use Monolog\Logger;
use srt4rulez\TracyBarDumpHandler;

$logger = new Logger('name');

$logger->pushHandler(new TracyBarDumpHandler());

$logger->debug('BarDump Header', [
    'foo' => 'bar',
]);
```

![Tracy BarDump](https://github.com/srt4rulez/monolog-tracy-bar-dump-handler/blob/master/assets/monolog-tracy-bar-dump-handler.png?raw=true "Tracy BarDump")

You may want to limit this handler to debug level only, with monolog's FilterHandler:

```php
<?php

use Monolog\Logger;
use Monolog\Handler\FilterHandler;
use srt4rulez\TracyBarDumpHandler;

$logger = new Logger('name');

// Only use the tracy bar dump handler with debug level.
$logger->pushHandler(new FilterHandler(new TracyBarDumpHandler(), [Logger::DEBUG, Logger::DEBUG]));

$logger->debug('BarDump Header', [
    'foo' => 'bar',
]);
```

The 3rd parameter to TracyBarDumpHandler is an options array passed to Tracy\Debugger::barDump():

```php
<?php

use Monolog\Logger;
use srt4rulez\TracyBarDumpHandler;

$logger = new Logger('name');

$logger->pushHandler(new TracyBarDumpHandler(Logger::DEBUG, true, [
    'depth' => 10,
]));

$logger->debug('BarDump Header', [
    'some' => [
        'deep' => [
            'array' => [
                'foo' => [
                    'bar' => [
                        'bar' => [],
                    ]
                ]
            ]
        ]
    ],
]);
```

See https://github.com/nette/tracy for more info.

## License

MIT

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
