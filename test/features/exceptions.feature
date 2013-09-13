Feature: Alla page loaded ok
  Check if every page of webapp are showed without exceptions

  Scenario: No exceptions visible on pageload
    When I am on one of this <pages>
        |             url                       |
        | /                                     |
        | /index.php?r=/admin/user/admin         |
        | /index.php?r=/example/default/elements |
        | /index.php?r=/example/default/index    |
        | /index.php?r=/example/auth/index       |
    Then I should not see "CException"

