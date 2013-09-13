<?php

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;


class MyFeatureContext extends BehatContext
{
    private $output = "";

    /**
     * @Given /^I can do something$/
     */
    public function iCanDoSomething()
    {
        // A start condition
    }

    /**
     * @When /^I generate some output$/
     */
    public function iGenerateSomeOutput()
    {
        $this->output = "Lorem ipsum dolor sit amet";
    }


    /** @Then /^I should get:$/ */
    public function iShouldGet(PyStringNode $string)
    {
        if ((string) $string !== $this->output) {
            throw new Exception(
                "Actual output is:\n" . $this->output
            );
        }
    }

}