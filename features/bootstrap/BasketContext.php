<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class BasketContext implements Context
{

        /**
     * @Given An empty basket
     */
    public function anEmptyBasket()
    {
        $this->basket = new Basket();
    }

    /**
     * @Then The basket price is :arg1 $
     */
    public function theBasketPriceIs($arg1)
    {
       if($this->basket->price() != $arg1) {
        throw new Exception("le prix ne correspond pas");
       }
    }

    /**
     * @Given A product costing :arg1 $ is added to the basket
     */
    public function aProductCostingIsAddedToTheBasket($price)
    {
        $product = new product($price);
        $this->basket->add($product);
    }

}
