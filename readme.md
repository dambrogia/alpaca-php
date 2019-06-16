# Alpaca-PHP
A PHP REST client for [Alpaca](https://alpaca.markets/).

### Getting started:

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

| Verb                       | Callable                                                                                                                                                                              | Endpoint                           |
| -------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------- |
| RFC6455 WebSocket protocol | [`Dambrogia\Alpaca\Client\Streaming::connect`](https://github.com/dambrogia/alpaca-php/blob/master/src/Client/Streaming.php#L29)                                                      | `/stream`                          |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Account::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Account.php#L14)                                                    | `/v1/account`                      |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Assets::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Assets.php#L14)                                                      | `/v1/assets`                       |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Assets::getBySymbol`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Assets.php#L27)                                              | `/v1/assets/$symbol`               |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Bars::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Bars.php#L17)                                                          | `/v1/bars/$timeframe`              |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Calendar::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Calendar.php#L14)                                                  | `/v1/calendar`                     |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Clock::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Clock.php#L14)                                                        | `/v1/clock`                        |
| `POST`                     | [`Dambrogia\Alpaca\Endpoint\V1\Orders::create`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Orders.php#L26)                                                   | `/v1/orders`                       |
| `DELETE`                   | [`Dambrogia\Alpaca\Endpoint\V1\Orders::delete `](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Orders.php#L59)                                                 | `/v1/orders/$id`                   |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Orders::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Orders.php#L15)                                                      | `/v1/orders`                       |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Orders::getByClientOrderId `](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Orders.php#L49)                                      | `/v1/orders:by_client_order_id`    |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Orders::getById`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Orders.php#L36)                                                  | `/v1/orders/$id`                   |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Positions::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Positions.php#L15)                                                | `/v1/positions`                    |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V1\Positions::getBySymbol`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V1/Positions.php#L27)                                        | `/v1/positions/$symbol`            |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Account::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Account.php#L14)                                                    | `/v2/account`                      |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Assets::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Assets.php#L14)                                                      | `/v2/assets`                       |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Assets::getBySymbol`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Assets.php#L27)                                              | `/v2/assets/$symbol`               |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Calendar::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Calendar.php#L14)                                                  | `/v2/calendar`                     |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Clock::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Clock.php#L14)                                                        | `/v2/clock`                        |
| `POST`                     | [`Dambrogia\Alpaca\Endpoint\V2\Orders::create`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Orders.php#L26)                                                   | `/v2/orders`                       |
| `DELETE`                   | [`Dambrogia\Alpaca\Endpoint\V2\Orders::delete `](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Orders.php#L59)                                                 | `/v2/orders/$id`                   |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Orders::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Orders.php#L15)                                                      | `/v2/orders`                       |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Orders::getByClientOrderId `](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Orders.php#L49)                                      | `/v2/orders:by_client_order_id`    |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Orders::getById`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Orders.php#L36)                                                  | `/v2/orders/$id`                   |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Positions::get`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Positions.php#L15)                                                | `/v2/positions`                    |
| `GET`                      | [`Dambrogia\Alpaca\Endpoint\V2\Positions::getBySymbol`](https://github.com/dambrogia/alpaca-php/blob/master/src/Endpoint/V2/Positions.php#L27)                                        | `/v2/positions/$symbol`            |

#### _If there are missing/incorrect endpoints, please create an issue so that it can be addressed!_

### Testing

To run the tests, download the package, copy `.env.sample` to `.env` and place your paper trading credentials in the .env file. Feel free to look at the testing [here](https://github.com/dambrogia/alpaca-php/tree/master/test).
