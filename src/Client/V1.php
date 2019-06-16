<?php

namespace Dambrogia\Alpaca\Client;

use Dambrogia\Alpaca\Endpoint\V1\Account;
use Dambrogia\Alpaca\Endpoint\V1\Assets;
use Dambrogia\Alpaca\Endpoint\V1\Bars;
use Dambrogia\Alpaca\Endpoint\V1\Calendar;
use Dambrogia\Alpaca\Endpoint\V1\Clock;
use Dambrogia\Alpaca\Endpoint\V1\Orders;
use Dambrogia\Alpaca\Endpoint\V1\Positions;

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

class V1 extends AbstractClient
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
     * Get the Assets endpoint class.
     * @return Assets
     */
    public function assets(): Assets
    {
        return new Assets($this);
    }
    /**
     * Get the Bars endpoint class.
     * @return Assets
     */
    public function bars(): Bars
    {
        return new Bars($this);
    }

    /**
     * Get the Calendar endpoint class.
     * @return Calendar
     */
    public function calendar(): Calendar
    {
        return new Calendar($this);
    }

    /**
     * Get the Clock endpoint class.
     * @return Clock
     */
    public function clock(): Clock
    {
        return new Clock($this);
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
     * Get the Positions endpoint class.
     * @return Positions
     */
    public function positions(): Positions
    {
        return new Positions($this);
    }
}
