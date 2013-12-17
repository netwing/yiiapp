<?php
namespace Codeception\Module;

require_once "vendor/autoload.php";

use kevintweber\PhpunitMarkupValidators\Assert\AssertHTML5,
    kevintweber\PhpunitMarkupValidators\Assert\AssertHTML,
    kevintweber\PhpunitMarkupValidators\Assert\AssertCSS,
    kevintweber\PhpunitMarkupValidators\Assert\AssertFeed;

// here you can define custom functions for WebGuy 

class WebHelper extends \Codeception\Module
{

    public function seeValidHtml5Markup($page)
    {   
        $content = false;
        if ($this->hasModule('PhpBrowser')) {
            $content = $this->getModule('PhpBrowser')->session->getPage()->getContent();
        }
        if ($this->hasModule('WebDriver')) {
            $content = $this->getModule('WebDriver')->webDriver->getPageSource();
        }
        AssertHTML5::IsValidMarkup($content, "\033[0;31mNo valid HTML5 on " . $page . "\033[0m");
    }        

}
