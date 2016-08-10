<?php
use ngfw\Recipe;

class RecipeTest extends PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $r = new Recipe();
        $this->assertInstanceOf(get_class(new Recipe), $r);
    }

    /**
     * GetFavicon Tests
     */
    public function test_getFavicon()
    {
        $favIcon = Recipe::getFavicon("http://youtube.com/");
        $this->assertEquals(
            '<img src="http://www.google.com/s2/favicons?domain=youtube.com/"  />',
            $favIcon
        );
    }
    public function test_getFavicon_with_attributes()
    {
        $favIcon = Recipe::getFavicon("http://youtube.com/", array(
            "class" => "favImg",
        ));
        $this->assertEquals(
            '<img src="http://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />',
            $favIcon
        );
    }

    /**
     * Get QRcode Tests
     */
    public function test_getQRcode()
    {
        $QRcode = Recipe::getQRcode("ngfw Recipe");
        $this->assertEquals(
            '<img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />',
            $QRcode
        );
    }
    public function test_getQRcode_with_attributes()
    {
        $QRcode = Recipe::getQRcode(
            "ngfw Recipe",
            $width = 350,
            $height = 350,
            $attributes = array(
                "class" => "QRCode",
            )
        );
        $this->assertEquals(
            '<img src="http://chart.apis.google.com/chart?chs=350x350&cht=qr&chl=ngfw+Recipe" class="QRCode" />',
            $QRcode
        );
    }

    /**
     * Get FileExtension Test
     */
    public function test_getFileExtension()
    {
        $ext = Recipe::getFileExtension(__FILE__);
        $this->assertEquals(
            'php',
            $ext
        );
    }

    /**
     * Get Gravatar Tests
     */
    public function test_getGravatar()
    {
        $Gravatar = Recipe::getGravatar("gejadze@gmail.com");
        $this->assertEquals(
            '<img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g" width="80px" height="80px"  />',
            $Gravatar
        );
    }
    public function test_getGravatar_with_attributes()
    {
        $Gravatar = Recipe::getGravatar(
            "gejadze@gmail.com",
            $size = 200,
            $default = 'monsterid',
            $rating = 'x',
            $attributes = array(
                "class" => "Gravatar",
            )
        );
        $this->assertEquals(
            '<img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x" width="200px" height="200px" class="Gravatar" />',
            $Gravatar
        );
    }
    /**
     * Link tags
     */
    public function test_createLinkTag()
    {
        $linkTags = Recipe::createLinkTag("google.com");
        $this->assertEquals(
            '<a href="google.com">google.com</a>',
            $linkTags
        );
    }
    public function test_createLinkTag_with_title()
    {
        $linkTags = Recipe::createLinkTag("google.com", "Visit Google");
        $this->assertEquals(
            '<a href="google.com" title="Visit Google" >Visit Google</a>',
            $linkTags
        );
    }
    public function test_createLinkTag_with_title_and_attribute()
    {
        $linkTags = Recipe::createLinkTag("google.com", "Visit Google", array(
            "class" => "outgoingLink",
        ));
        $this->assertEquals(
            '<a href="google.com" title="Visit Google" class="outgoingLink">Visit Google</a>',
            $linkTags
        );
    }

    /**
     * Email validation
     */

    public function test_validateEmail_success()
    {
        $isValid = Recipe::validateEmail("user@gmail.com");
        $this->assertTrue($isValid);
    }
    public function test_validateEmail_fail()
    {
        $isValid = Recipe::validateEmail("user@domain");
        $this->assertFalse($isValid);
    }

    /**
     * URL validation
     */
    public function test_validateURL_success()
    {
        $isValid = Recipe::validateURL("http://github.com/");
        $this->assertTrue($isValid);
    }
    public function test_validateURL_fail()
    {
        $isValid = Recipe::validateURL("http://github com/");
        $this->assertFalse($isValid);
    }

    /**
     * RSS Reader
     */
    public function test_rssReader()
    {
        $rssArray = Recipe::rssReader("https://github.com/ngfw/Recipe/commits/master.atom");
        $this->assertInternalType('array', $rssArray);
    }

    /**
     * Object to array conversion
     */
    public function test_objectToArray()
    {
        $obj      = new stdClass;
        $obj->foo = 'bar';
        $obj->baz = 'qux';
        $array    = Recipe::objectToArray($obj);
        $this->assertInternalType('array', $array);
    }

    public function test_arrayToObject()
    {
        $array = array(
            "foo" => "bar",
            "baz" => "qux",
        );
        $obj    = Recipe::arrayToObject($array);
        $this->assertInternalType('object', $obj);
    }

    /**
     * Colors
     */
    public function test_hex2rgb()
    {
        $rgb = Recipe::hex2rgb("#FFF");
        $this->assertEquals(
            'rgb(255, 255, 255)',
            $rgb
        );
    }

    public function test_rgb2hex()
    {
        $hex = Recipe::rgb2hex("rgb(123,123,123)");
        $this->assertEquals(
            '#7b7b7b',
            $hex
        );
    }
    /**
     * Test 
     */
    public function test_generateRandomPassword()
    {
        $randomPass = Recipe::generateRandomPassword(10);
        $this->assertTrue(strlen($randomPass) === 10);
    }

    /**
     * Encode / Decode
     */
    public function test_simpleEncode()
    {
        $encodedString = Recipe::simpleEncode("php recipe");
        $this->assertEquals(
            'qcnVhqjKxpuilw==',
            $encodedString
        );
        
    }
    public function test_simpleDecode()
    {
        $decodedString = Recipe::simpleDecode("qcnVhqjKxpuilw==");
        $this->assertEquals(
            'php recipe',
            $decodedString
        );
    }
    /**
     * Check if request is on https
     * @return [type] [description]
     */
    public function test_isHttps()
    {
        $_SERVER['HTTPS'] = true;
        $isHttps = Recipe::isHttps();
        $this->assertTrue($isHttps);
    }
    public function test_isAjax()
    {
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
        $isAjax = Recipe::isAjax();
        $this->assertTrue($isAjax);
    }
    /**
     * Numbers
     */
    public function test_isNumberOdd()
    {
        $number = 5;
        $isNumberOdd = Recipe::isNumberOdd($number);
        $this->assertTrue($isNumberOdd);   
    }
    public function test_isNumberEven()
    {
        $number = 8;
        $isNumberEven = Recipe::isNumberEven($number);
        $this->assertTrue($isNumberEven);   
    }
    public function test_getCurrentURL()
    {
        $_SERVER['REQUEST_URI'] = "example.com";
        $currentURL = Recipe::getCurrentURL();
        $this->assertEquals(
            'http://example.com',
            $currentURL
        );
    }
    public function test_getClientIP()
    {
        $_SERVER['REMOTE_ADDR'] = "10.10.10.10";
        $ip = Recipe::getClientIP();
        $this->assertEquals(
            '10.10.10.10',
            $ip
        );
    }
    public function test_isMobile()
    {

    }
    public function test_getBrowser()
    {

    }
    public function test_getClientLocation()
    {

    }
    public function test_numberToWord()
    {

    }
    public function test_secondsToText()
    {

    }
    public function test_minutesToText()
    {

    }
    public function test_hoursToText()
    {

    }
    public function test_shortenString()
    {

    }
    public function test_curl()
    {

    }
    public function test_expandShortUrl()
    {

    }
    public function test_getAlexaRank()
    {

    }
    public function test_getGooglePageRank()
    {

    }
    public function test_getTinyUrl()
    {

    }
    public function test_getKeywordSuggestionsFromGoogle()
    {

    }
    public function test_wikiSearch()
    {

    }
    public function test_notification()
    {

    }
    public function test_autoEmbed()
    {

    }
    public function test_makeClickableLinks()
    {

    }
    public function test_debug()
    {

    }
}
// EOF
