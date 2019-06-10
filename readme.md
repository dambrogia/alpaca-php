# Alpaca-PHP
A PHP REST client for [Alpaca](https://alpaca.markets/).

### Getting started:

    @todo - this needs to be uploaded to packagist for this to work.
    composer require dambrogia/alpaca-php

#### Using the client within your package:

Declare your configuration:

    use Dambrogia\Alpaca\Config;
    ...
    $config = new Config($key, $secret, Config::ENV_PAPER);
    // Can also use Config::ENV_LIVE here ^ as well for production mode.

Once you declare the configuration, there's 2 ways to use the package. The entire package can be loaded and specific endpoints/features can be navigated to, or only certain sets of endpoints can be loaded initially. The package is fairly small so the overhead to load the entire library isn't much.


    use Dambrogia\Alpaca\Alpaca;
    ...
    $account = (new Alpaca($config))->v2()->account()->get();
    // or
    use Dambrogia\Alpaca\Client\V2;
    ...
    $account = (new V2($config))->account()->get();

### Endpoints Covered

@todo.

### Testing

To run the tests, download the package, copy `.env.sample` to `.env` and place your paper trading credentials in the .env file. Feel free to look at the testing [here](https://github.com/dambrogia/alpaca-php/tree/master/test).
