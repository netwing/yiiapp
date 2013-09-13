<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

//
// Require 3rd-party libraries here:
//
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
        // Load other context Class
        $this->useContext('MyFeatureContext', new MyFeatureContext($parameters));

    }

    /**
     * @Given /^PhpUnit was installed$/
     */
    public function phpunitWasInstalled()
    {
        require_once 'PHPUnit/Autoload.php';
        require_once 'PHPUnit/Framework/Assert/Functions.php';
    }

    /**
     * @Then /^I should able to execute asserts commands$/
     */
    public function iShouldAbleToExecuteAssertsCommands()
    {
        assertEquals(1, 1);
    }

    /**
     * @Given /^I wait for "([^"]*)" to be visible$/
     */
    public function iWaitForAnElementToBeVisibile($selector)
    {
        $this->getSession()->wait(4000,
            "$('." . $selector . ", #". $selector . "').length > 0"
        );
    }

    /**
     * @When /^I am on one of this <pages>$/
     */
    public function iAmOnOneOfThisPage(TableNode $url_table)
    {
        foreach ($url_table->getHash() as $page) {
            // echo "Visiting " . $page["url"] . PHP_EOL;
            $this->visit($page["url"]);
        }
    }


}
