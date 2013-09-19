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

    /**
     * Take screenshot when step fails. Works only with Selenium2Driver.
     * Screenshot is saved at [Date]/[Feature]/[Scenario]/[Step].jpg
     *
     * @AfterStep @javascript
     */
    public function takeScreenshotAfterFailedStep(Behat\Behat\Event\StepEvent $event) {
        if ($event->getResult() === Behat\Behat\Event\StepEvent::FAILED) {
            $driver = $this->getSession()->getDriver();
            if ($driver instanceof Behat\Mink\Driver\Selenium2Driver) {
                $step = $event->getStep();
                $path = array(
                    'date' => date("Ymd-His"),
                    'feature' => $step->getParent()->getFeature()->getTitle(),
                    'scenario' => $step->getParent()->getTitle(),
                    'step' => $step->getType() . ' ' . $step->getText()
                );
                $path = preg_replace('/[^\-\.\w]/', '_', $path);
                $dirname = __DIR__ . '/../../results/behat/';
                $filename =  $dirname . implode('_', $path) . '.jpg';
 
                // Create directories if needed
                if (!@is_dir(dirname($dirname))) {
                    @mkdir(dirname($dirname), 0775, TRUE);
                }
 
                file_put_contents($filename, $driver->getScreenshot());
            }
        }
    }
}
