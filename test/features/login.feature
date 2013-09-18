Feature: Login
  Verifica del funzionamento del login 

  @javascript
  Scenario: Login/Logout check
    Given I am on "/"
    Then I should see "Login"
    When I follow "Login"
    Then I should see "YIIAPP - Login"
    When I wait for "LoginForm_username" to be visible
    And I fill in "LoginForm_username" with "john"
    And  I fill in "LoginForm_password" with "john"
    And I press "Sign in"
    Then I should see "Incorrect username or password"
    When I wait for "LoginForm_username" to be visible
    And I fill in "LoginForm_username" with "administrator"
    And  I fill in "LoginForm_password" with "password"
    And I press "Sign in"
    Then I should not see "Incorrect username or password"
    And I should see "Amministratore"
    Given I am on "/index.php?r=site/logout"
    Then I should not see "Amministratore"
    And I should see "Login"

  @javascript
  Scenario: Check access to Users administration
    Given I am on "/"
    Then I should see "Login"
    When I follow "Login"
    Then I should see "YIIAPP - Login"
    When I wait for "LoginForm_username" to be visible
    And I fill in "LoginForm_username" with "administrator"
    And  I fill in "LoginForm_password" with "password"
    And I press "Sign in"
    Then I should not see "Incorrect username or password"
    Then the ".navbar.navbar-static-top" element should contain "Users"
    Given I am on "/index.php?r=site/logout"
    When I follow "Login"
    And I wait for "LoginForm_username" to be visible
    When I fill in "LoginForm_username" with "simpleuser"
    And  I fill in "LoginForm_password" with "simpleuser"
    And I press "Sign in"
    Then I should not see "Incorrect username or password"
    Then the ".navbar.navbar-static-top" element should not contain "Users"
