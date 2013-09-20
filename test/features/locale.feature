Feature: Login
  Verifica del funzionamento del login 

  Scenario: Locale definition in main
    Given I am on "/"
    Then I should not see "Unrecognized locale"

  @javascript
  Scenario: Setting locale by user
    Given I am on "/"
    And I wait for "languageSelector" to be visible
    Then I should see "English - English"
    When I select "Italian - Italiano" from "languageSelector"
    And I wait for "languageSelector" to be visible
    Then I should see "Italiano - Italiano"
    When I select "Inglese - English" from "languageSelector"
    And I wait for "languageSelector" to be visible
    Then I should see "English - English"

 
