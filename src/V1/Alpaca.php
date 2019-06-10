<?php

namespace Dambrogia\Alpaca\V1;

use Dambrogia\Alpaca\AbstractClient;
use Dambrogia\Alpaca\V1\Endpoint\Account;
use Dambrogia\Alpaca\V1\Endpoint\Assets;
use Dambrogia\Alpaca\V1\Endpoint\Clock;
use Dambrogia\Alpaca\V1\Endpoint\Orders;

/**
 * This class is used to retrieve all subjects and their endpoints available
 * from here: https://docs.alpaca.markets/api-documentation
 * Examples (assuming $alpaca is an instance of this class):
 *      $account = $alpaca->account()->get();
 *      $orders = $alpaca->orders()->delete($id);
 * The subjects in the left sidebar will have a class dedicated to them.
 * All spelling for classes will match the spelling in the left sidebar.
 * Look into the classes returned from this class for more information.
 */

class Alpaca extends AbstractClient
{
    /**
     * Get the account endpoint class.
     * @return Account
     */
    public function account(): Account
    {
        return new Account($this);
    }

    /**
     * Get the Orders endpoint class.
     * @return Orders
     */
    public function orders(): Orders
    {
        return new Orders($this);
    }

    /**
     * Get the Assets endpoint class.
     * @return Assets
     */
    public function assets(): Assets
    {
        return new Assets($this);
    }

    /**
     * Get the Orders endpoint class.
     * @return Clock
     */
    public function clock(): Clock
    {
        return new Clock($this);
    }
}
