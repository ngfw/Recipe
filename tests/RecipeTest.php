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
        		"class" => "QRCode"
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
        		"class" => "Gravatar"
        	)
    	);
    	$this->assertEquals(
            '<img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x" width="200px" height="200px" class="Gravatar" />',
            $Gravatar 
        );
    }
    public function test_getTwitterShareCount()
    {

    }
    public function test_getFacebookShareCount()
    {

    }
    public function test_getFacebookLikesCount()
    {

    }
    public function test_getGooglePlusShareCount()
    {

    }
    public function test_getPinterestShareCount()
    {

    }
    public function test_getLinkedInShareCount()
    {

    }
    public function test_createLinkTag()
    {

    }
    public function test_validateEmail()
    {

    }
    public function test_validateURL()
    {

    }
    public function test_rssReader()
    {

    }
    public function test_objectToArray()
    {

    }
    public function test_arrayToObject()
    {

    }
    public function test_hex2rgb()
    {

    }
    public function test_rgb2hex()
    {

    }
    public function test_generateRandomPassword()
    {

    }
    public function test_simpleEncode()
    {

    }
    public function test_simpleDecode()
    {

    }
    public function test_isHttps()
    {

    }
    public function test_isAjax()
    {

    }
    public function test_isNumberOdd()
    {

    }
    public function test_isNumberEven()
    {

    }
    public function test_getCurrentURL()
    {

    }
    public function test_getClientIP()
    {

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
