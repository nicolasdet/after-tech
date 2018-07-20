<?php 


use Behat\MinkExtension\Context\MinkContext;

class WebContext extends MinkContext
{
	
    /**
     * @When I Wait for :arg1 segonds
     */
    public function iWaitForSegonds2($arg1)
    {
        $this->getSession()->wait($arg1 * 1000);
    }

    /**
     * @When I click the :arg1 element
    public function iClickTheElement($selector)
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', $selector);

        if (empty($element)) {
            throw new Exception("No html element found for the selector ('$selector')");
        }

        $element->click();
    }
     */

  




}