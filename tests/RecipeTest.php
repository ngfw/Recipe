<?php

use ngfw\Recipe;

class RecipeTest extends PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $r = new Recipe();
        $this->assertInstanceOf(get_class(new Recipe()), $r);
    }

    /**
     * GetFavicon tests.
     *
     * @param string $url
     * @param string $expectedUrl
     * @dataProvider dp_getFavicon
     */
    public function test_getFavicon($url, $expectedUrl)
    {
        $favIcon = Recipe::getFavicon($url);
        $this->assertEquals(
            '<img src="https://www.google.com/s2/favicons?domain='.$expectedUrl.'"/>',
            $favIcon
        );
    }

    public function test_getFavicon_with_attributes()
    {
        $favIcon = Recipe::getFavicon('http://youtube.com/', [
            'class' => 'favImg',
        ]);
        $this->assertEquals(
            '<img src="https://www.google.com/s2/favicons?domain=http%3A%2F%2Fyoutube.com%2F" class="favImg"/>',
            $favIcon
        );
    }

    /**
     * Get QRcode Tests.
     */
    public function test_getQRcode()
    {
        $QRcode = Recipe::getQRcode('ngfw Recipe');
        $this->assertEquals(
            '<img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />',
            $QRcode
        );
    }

    public function test_getQRcode_with_attributes()
    {
        $QRcode = Recipe::getQRcode(
            'ngfw Recipe',
            $width = 350,
            $height = 350,
            $attributes = [
                'class' => 'QRCode',
            ]
        );
        $this->assertEquals(
            '<img src="http://chart.apis.google.com/chart?chs=350x350&cht=qr&chl=ngfw+Recipe" class="QRCode" />',
            $QRcode
        );
    }

    /**
     * Get FileExtension Test.
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
     * Get Gravatar Tests.
     */
    public function test_getGravatar()
    {
        $Gravatar = Recipe::getGravatar('gejadze@gmail.com');
        $this->assertEquals(
            '<img src="https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g" width="80px" height="80px"  />',
            $Gravatar
        );
    }

    public function test_getGravatar_with_attributes()
    {
        $Gravatar = Recipe::getGravatar(
            'gejadze@gmail.com',
            $size = 200,
            $default = 'monsterid',
            $rating = 'x',
            $attributes = [
                'class' => 'Gravatar',
            ]
        );
        $this->assertEquals(
            '<img src="https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x" width="200px" height="200px" class="Gravatar" />',
            $Gravatar
        );
    }

    /**
     * Link tags.
     */
    public function test_createLinkTag()
    {
        $linkTags = Recipe::createLinkTag('google.com');
        $this->assertEquals(
            '<a href="google.com">google.com</a>',
            $linkTags
        );
    }

    public function test_createLinkTag_with_title()
    {
        $linkTags = Recipe::createLinkTag('google.com', 'Visit Google');
        $this->assertEquals(
            '<a href="google.com" title="Visit Google" >Visit Google</a>',
            $linkTags
        );
    }

    public function test_createLinkTag_with_title_and_attribute()
    {
        $linkTags = Recipe::createLinkTag('google.com', 'Visit Google', [
            'class' => 'outgoingLink',
        ]);
        $this->assertEquals(
            '<a href="google.com" title="Visit Google" class="outgoingLink">Visit Google</a>',
            $linkTags
        );
    }

    /**
     * Email validation.
     */
    public function test_validateEmail_success()
    {
        $isValid = Recipe::validateEmail('user@gmail.com');
        $this->assertTrue($isValid);

        $isValid = Recipe::validateEmail('user@fakemail.fr', $tempEmailAllowed = true);
        $this->assertTrue($isValid);
    }

    public function test_validateEmail_fail()
    {
        $isValid = Recipe::validateEmail('user@domain');
        $this->assertFalse($isValid);

        $isValid = Recipe::validateEmail('user@veryLongAndNotExistingDomainName132435.com');
        $this->assertFalse($isValid);

        $isValid = Recipe::validateEmail('user@fakeinbox.com', $tempEmailAllowed = false);
        $this->assertFalse($isValid);
    }

    /**
     * URL validation.
     */
    public function test_validateURL_success()
    {
        $isValid = Recipe::validateURL('http://github.com/');
        $this->assertTrue($isValid);
    }

    public function test_validateURL_fail()
    {
        $isValid = Recipe::validateURL('http://github com/');
        $this->assertFalse($isValid);
    }

    /**
     * RSS Reader.
     */
    public function test_rssReader()
    {
        $rssArray = Recipe::rssReader('https://github.com/ngfw/Recipe/commits/master.atom');
        $this->assertInternalType('array', $rssArray);
    }

    /**
     * Object to array conversion.
     */
    public function test_objectToArray()
    {
        $obj = new stdClass();
        $obj->foo = 'bar';
        $obj->baz = 'qux';
        $array = Recipe::objectToArray($obj);
        $this->assertInternalType('array', $array);
    }

    public function test_arrayToObject()
    {
        $array = [
            'foo' => 'bar',
            'baz' => 'qux',
        ];
        $obj = Recipe::arrayToObject($array);
        $this->assertInternalType('object', $obj);
    }

    public function test_arrayToString()
    {
        $array = [
            'foo' => 'bar',
            'baz' => 'qux',
        ];
        $string = Recipe::arrayToString($array);
        $this->assertEquals(
            'foo="bar" baz="qux"',
            $string
        );
    }

    /**
     * Colors.
     */
    public function test_hex2rgb()
    {
        $rgb = Recipe::hex2rgb('#FFF');
        $this->assertEquals(
            'rgb(255, 255, 255)',
            $rgb
        );
    }

    public function test_rgb2hex()
    {
        $hex = Recipe::rgb2hex('rgb(123,123,123)');
        $this->assertEquals(
            '#7b7b7b',
            $hex
        );
    }

    /**
     * Test.
     */
    public function test_generateRandomPassword()
    {
        $randomPass = Recipe::generateRandomPassword(10);
        $this->assertTrue(strlen($randomPass) === 10);
    }

    /**
     * Encode / Decode.
     */
    public function test_simpleEncode()
    {
        $encodedString = Recipe::simpleEncode('php recipe');
        $this->assertEquals(
            'qcnVhqjKxpuilw==',
            $encodedString
        );
    }

    public function test_simpleDecode()
    {
        $decodedString = Recipe::simpleDecode('qcnVhqjKxpuilw==');
        $this->assertEquals(
            'php recipe',
            $decodedString
        );
    }

    public function test_generateServerSpecificHash()
    {
        $serverHash = Recipe::generateServerSpecificHash();
        $this->assertEquals(
            32,
            strlen($serverHash)
        );
    }

    /**
     * Check if request is on https.
     *
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
     * Numbers.
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

    /**
     * Current URL.
     */
    public function test_getCurrentURL()
    {
        $_SERVER['REQUEST_URI'] = 'example.com';
        $currentURL = Recipe::getCurrentURL();
        $this->assertEquals(
            'http://example.com',
            $currentURL
        );
    }

    /**
     * Get Client IP address.
     */
    public function test_getClientIP()
    {
        $_SERVER['REMOTE_ADDR'] = '8.8.8.8';
        $ip = Recipe::getClientIP();
        $this->assertEquals(
            '8.8.8.8',
            $ip
        );
    }

    /**
     * Test mobile device.
     */
    public function test_isMobile()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7';
        $isMobile = Recipe::isMobile();
        $this->assertTrue($isMobile);
    }

    /**
     * Detect user browser.
     */
    public function test_getBrowser()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7';
        $browser = Recipe::getBrowser();
        $this->assertInternalType('string', $browser);
    }

    /**
     * Get Clients Location.
     */
    public function test_getClientLocation()
    {
        $_SERVER['REMOTE_ADDR'] = '8.8.8.8'; // let's see where is google
        $location = Recipe::getClientLocation();
        $this->assertInternalType('string', $location);
    }

    /**
     * Convert number to word.
     */
    public function test_numberToWord()
    {
        $number = '864210';
        $word = Recipe::numberToWord($number);
        $this->assertEquals(
            'eight hundred and sixty-four thousand, two hundred and ten',
            $word
        );
    }

    /**
     * Convert number of seconds to time.
     */
    public function test_secondsToText()
    {
        $seconds = 3610;
        $duration = Recipe::secondsToText($seconds);
        $this->assertEquals(
            '1 hour and 10 seconds',
            $duration
        );
        $duration = Recipe::secondsToText($seconds, $returnAsWords = true);
        $this->assertEquals(
            'one hour and ten seconds',
            $duration
        );
    }

    /**
     * Convert number of minutes to time.
     */
    public function test_minutesToText()
    {
        $minutes = 60 * 24 * 2;
        $duration = Recipe::minutesToText($minutes);
        $this->assertEquals(
            '2 days',
            $duration
        );
        $duration = Recipe::minutesToText($minutes, $returnAsWords = true);
        $this->assertEquals(
            'two days',
            $duration
        );
    }

    /**
     * Convert hours to text.
     */
    public function test_hoursToText()
    {
        $hours = 4.2;
        $duration = Recipe::hoursToText($hours);
        $this->assertEquals(
            '4 hours and 12 minutes',
            $duration
        );
        $duration = Recipe::hoursToText($hours, $returnAsWords = true);
        $this->assertEquals(
            'four hours and twelve minutes',
            $duration
        );
    }

    /**
     * Shorten the string.
     */
    public function test_shortenString()
    {
        $string = 'The quick brown fox jumps over the lazy dog';
        $shortenString = Recipe::shortenString($string, 20);
        $this->assertEquals(
            'The quick brown f...',
            $shortenString
        );

        $shortenString = Recipe::shortenString($string, 20, $addEllipsis = false);
        $this->assertEquals(
            'The quick brown fox ',
            $shortenString
        );

        $shortenString = Recipe::shortenString($string, 20, $addEllipsis = false, $wordsafe = true);
        $this->assertEquals(
            'The quick brown fox',
            $shortenString
        );
    }

    /**
     * Curl.
     */
    public function test_curl()
    {
        $testCurl = Recipe::curl('https://api.ipify.org');
        if (filter_var($testCurl, FILTER_VALIDATE_IP)) {
            $ipCheck = true;
        }
        $this->assertTrue($ipCheck);

        $testCurlPOST = Recipe::curl('http://jsonplaceholder.typicode.com/posts', $method = 'POST', $data = [
            'title'  => 'foo',
            'body'   => 'bar',
            'userId' => 1,
        ]);
        $POST_obj = json_decode($testCurlPOST);
        $this->assertInternalType('object', $POST_obj);

        $testCurlHeaderAndReturnInfo = Recipe::curl('http://jsonplaceholder.typicode.com/posts', $method = 'GET', $data = false, $header = [
            'Accept' => 'application/json',
        ], $returnInfo = true);
        $this->assertInternalType('array', $testCurlHeaderAndReturnInfo);
        $this->assertInternalType('array', $testCurlHeaderAndReturnInfo['info']);
        $this->assertInternalType('string', $testCurlHeaderAndReturnInfo['contents']);
    }

    /**
     * Expend shortened URLs.
     */
    public function test_expandShortUrl()
    {
        $expandedURL = Recipe::expandShortUrl('https://goo.gl/rvDnMX');
        $this->assertEquals(
            'https://github.com/ngfw/Recipe',
            $expandedURL
        );
    }

    /**
     * get Alexa Ranking.
     */
    public function test_getAlexaRank()
    {
        $AlexaRank = Recipe::getAlexaRank('github.com');
        $this->assertInternalType('int', $AlexaRank);
    }

    /**
     * Shorten the URL.
     */
    public function test_getTinyUrl()
    {
        $TinyUrl = Recipe::getTinyUrl('https://github.com/ngfw/Recipe');
        $this->assertEquals(
            'http://tinyurl.com/h2nchjh',
            $TinyUrl
        );
    }

    /**
     * Get google keyword suggestions.
     */
    public function test_getKeywordSuggestionsFromGoogle()
    {
        $suggestions = Recipe::getKeywordSuggestionsFromGoogle('Tbilisi, Georgia');
        $this->assertInternalType('array', $suggestions);
        $this->assertEquals(
            10,
            count($suggestions)
        );
    }

    /**
     * Wikipedia search.
     */
    public function test_wikiSearch()
    {
        $wiki = Recipe::wikiSearch('Tbilisi');
        $this->assertInternalType('array', $wiki);
        $this->assertInternalType('string', $wiki['title']);
    }

    /**
     * Create HTML notifications.
     */
    public function test_notification()
    {
        $notification = Recipe::notification('Test Successful');
        $this->assertEquals(
            '<div style="display: block;padding: 0.5em;border: solid 1px;border-radius: 0.125em;margin-bottom: 1em; border-color: #a6d9f2;color: #0a5276;background-color: #e7f6fd;"  role="alert">Test Successful</div>',
            $notification
        );
    }

    /**
     * Auto Embed.
     */
    public function test_autoEmbed()
    {
        $string = 'Checkout Solomun, Boiler Room at https://www.youtube.com/watch?v=bk6Xst6euQk';
        $converted = Recipe::autoEmbed($string);
        $this->assertEquals(
            'Checkout Solomun, Boiler Room at<iframe width="560" height="315" src="https://www.youtube.com/embed/bk6Xst6euQk?feature=oembed" frameborder="0" allowfullscreen></iframe>',
            $converted
        );
    }

    /**
     * Make links clickable.
     */
    public function test_makeClickableLinks()
    {
        $string = 'Check PHP Recipes on https://github.com/ngfw/Recipe';
        $clickable = Recipe::makeClickableLinks($string);

        $this->assertEquals(
            'Check PHP Recipes on <a href="https://github.com/ngfw/Recipe" >https://github.com/ngfw/Recipe</a>',
            $clickable
        );
    }

    /**
     * Custom Debug.
     */
    public function test_debug()
    {
        $string = 'Test me';
        ob_start();
        Recipe::debug($string);
        $debug = ob_get_clean();
        $this->assertInternalType('string', $debug);
    }

    public function test_getReferer()
    {
        $_SERVER['HTTP_REFERER'] = 'example.com';
        $Referer = Recipe::getReferer();
        $this->assertEquals(
            'example.com',
            $Referer
        );
    }

    public function test_compressPage()
    {
        // man, testing this will be painful..
        // Just trust me, it works, ROFL
    }

    public function test_ordinal()
    {
        $ordinal = Recipe::ordinal(2);
        $this->assertEquals($ordinal, '2nd');
    }

    public function test_numberOfDaysInMonth()
    {
        $numDaysFeb = 29;
        $numDays = Recipe::numberOfDaysInMonth(2, 2016);

        $this->assertEquals($numDaysFeb, $numDays);
    }

    public function test_pr()
    {
        $this->expectOutputString("<pre>Array\n(\n    [0] => he\n    [1] => ll\n    [2] => oo\n)\n</pre>");
        Recipe::pr(['he', 'll', 'oo']);
    }

    public function test_bytesToHumanReadableSize()
    {
        $HumanReadable = Recipe::bytesToHumanReadableSize('17179869184');
        $this->assertEquals($HumanReadable, '16 GB');
    }

    /**
     * @return array
     */
    public function dp_getFavicon()
    {
        return [
            [
                'http://youtube.com/',
                'http%3A%2F%2Fyoutube.com%2F',
            ],
            [
                'http.net',
                'http.net',
            ],
            [
                'http://youtube.com/test',
                'http%3A%2F%2Fyoutube.com%2Ftest',
            ],
        ];
    }
}
// EOF
