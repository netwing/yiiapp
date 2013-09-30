Feature: Config
  Verifica configurazioni

  Scenario: PHPUnit was installed
    Given PhpUnit was installed
    Then I should able to execute asserts commands

  Scenario: Config file must exists
    Given I am on "/"
    Then I should not see "Configuration not found!"
    Then print last response

  Scenario: Db config must be ok
    Given I am on "/"
    Then I should not see "Access denied for user"

  Scenario: App must be initialized
    Given I am on "/"
    Then I should not see "Base table or view not found"

  Scenario: My context
    Given I can do something
    When I generate some output
    Then I should get:
    """
    Lorem ipsum dolor sit amet
    """

