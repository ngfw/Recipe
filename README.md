# Recipe
####Collection of PHP Functions


---
Table of Contents
* [Favicon](#favicon)
* [QRcode](#qrcode)
* [File extension](#file-extension)
* [Gravatar](#gravatar)
* [Creating Link Tags](#creating-link-tags)
* [Validate email address](#validate-email-address)
* [Validate URL](#validate-url)
* [RSS Reader](#rss-reader)
* [Object to Array](#object-to-array)
* [Array to Object](#array-to-object)
* [HEX to RGB](#hex-to-rgb)
* [RGB to HEX](#rgb-to-hex)
* [Generate Random Password](#generate-random-password)
* [Simple Encode](#simple-encode)
* [Simple Decode](#simple-decode)
* [Detect HTTPS](#detect-https)
* [Detect AJAX](#detect-ajax)
* [Check if number is odd](#check-if-number-is-odd)
* [Check if number is even](#check-if-number-is-even)
* [Get Current URL](#get-current-url)
* [Get Client IP](#get-client-ip)
* [Detect Mobile](#detect-mobile)
* [Get Browser](#get-browser)
* [Get Client Location](#get-client-location)
* [Number To Word conversion](#number-to-word-conversion)
* [Seconds To Text](#seconds-to-text)
* [Minutes To Text](#minutes-to-text)
* [Hours To Text](#hours-to-text)
* [Shorten String](#shorten-string)
* [CURL](#curl)
* [Expand Short URL](#expand-short-url)
* [Get Alexa Rank](#ge-alexa-rank)
* [Get Google PageRank](#get-google-pagerank)
* [Get Tiny URL](#get-tiny-url)
* [Get Keyword Suggestions From Google](#get-keyword-suggestions-from-google)
* [WIKI Search](#wiki-search)
* [notification](#notification)
* [Auto Embed](#auto-embed)
* [Make Clickable Links](#make-clickable-links)
* [Debug](#debug)

---

###Favicon
Getting remote website Favicon:
```php
$favIcon = \ngfw\Recipe::getFavicon("http://youtube.com/");

echo $favIcon; 
// outputs: <img src="http://www.google.com/s2/favicons?domain=youtube.com/"  />
```
<img src="http://www.google.com/s2/favicons?domain=youtube.com/"  />

Getting remote website Favicon with HTML attributes:
```php
$favIcon = \ngfw\Recipe::getFavicon(
          "http://youtube.com/", 
          array(
            "class" => "favImg"
          )
);
echo $favIcon; 
//outputs: <img src="http://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />
            
```
<img src="http://www.google.com/s2/favicons?domain=youtube.com/" class="favImg" />


###QRcode
Generating QR code
```php
$QRcode = \ngfw\Recipe::getQRcode("ngfw Recipe");
echo $QRcode;  
//outputs: <img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />
```
<img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=ngfw+Recipe"  />

Generating QR code and adding HTML attributes:
```php
$QRcode = \ngfw\Recipe::getQRcode(
    "ngfw Recipe",
    $width = 350, 
    $height = 350, 
    $attributes = array(
        "class" => "QRCode"
    )
);
echo $QRcode;  
// outputs: <img src="http://chart.apis.google.com/chart?chs=350x350&cht=qr&chl=ngfw+Recipe" class="QRCode" />
```
<img src="http://chart.apis.google.com/chart?chs=350x350&cht=qr&chl=ngfw+Recipe" class="QRCode" />


###File extension
```php
$ext = \ngfw\Recipe::getFileExtension(__FILE__); // replace '__FILE__' with your filename
echo $ext; 
//outputs: php
```

###Gravatar
Getting Gravatar:
```php
$Gravatar = \ngfw\Recipe::getGravatar("gejadze@gmail.com");
echo $Gravatar;
// outputs: <img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g" width="80px" height="80px"  />
```

![https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g](https://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=mm&size=80&rating=g)

Getting Gravatar with HTML attributes:
```php
$Gravatar = \ngfw\Recipe::getGravatar(
    "gejadze@gmail.com",
    $size = 200,
    $default = 'monsterid',
    $rating = 'x',
    $attributes = array(
        "class" => "Gravatar"
    )
);
ehco $Gravatar;
//Outputs: <img src="http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x" width="200px" height="200px" class="Gravatar" />'
```
![NG Gravatar](http://www.gravatar.com/avatar.php?gravatar_id=9d9d478c3b65d4046a84cf84b4c8bf46&default=monsterid&size=200&rating=x)



###Creating Link Tags
Simple Link:
```php
$linkTags = \ngfw\Recipe::createLinkTag("google.com");
echo $linkTags;   
//outputs: <a href="google.com">google.com</a>
```

Link with title:
```php
$linkTags = \ngfw\Recipe::createLinkTag("google.com", "Visit Google");
echo $linkTags;   
//outputs: <a href="google.com" title="Visit Google" >Visit Google</a>
```

Link with title and HTML attributes:
```php
$linkTags = \ngfw\Recipe::createLinkTag("google.com", "Visit Google", array(
    "class" => "outgoingLink"
));
echo $linkTags;   
//outputs: <a href="google.com" title="Visit Google" class="outgoingLink">Visit Google</a>
```


### Validate email address
```php
$isValid = \ngfw\Recipe::validateEmail("user@gmail.com");
var_dump($isValid);
// outputs: true (bool)
```

### Validate URL
```php
$isValid = \ngfw\Recipe::validateURL("http://github.com/");
var_dump($isValid);
// outputs: true (bool)
```

### RSS Reader
```php
$rssArray = \ngfw\Recipe::rssReader("https://github.com/ngfw/Recipe/commits/master.atom");
var_dump($rssArray);
// Outputs feed as an array
```

### Object to Array
```php
$obj = new stdClass;
$obj->foo = 'bar';
$obj->baz = 'qux';
$array = \ngfw\Recipe::objectToArray($obj);
var_dump($array);

// outputs:
// array(2) {
//   ["foo"]=>
//   string(3) "bar"
//   ["baz"]=>
//   string(3) "qux"
// }

```

###Array to Object
```php
$array = array(
    "foo" => "bar",
    "baz" => "qux",
);
$obj = \ngfw\Recipe::arrayToObject($array);
// outputs:
// object(stdClass)#15 (2) {
//   ["foo"]=>
//   string(3) "bar"
//   ["baz"]=>
//   string(3) "qux"
// }
```
###HEX to RGB
```php
$rgb = Recipe::hex2rgb("#FFF");
echo $rgb;
// outputs: rgb(255, 255, 255)
```
###RGB to HEX
```php
$hex = Recipe::rgb2hex("rgb(123,123,123)");
// outputs: #7b7b7b
```
###Generate Random Password
```php
$randomPass = Recipe::generateRandomPassword(10);
echo $randomPass;
// outputs random 10 character long string 
```
###Simple Encode

###Simple Decode

###Detect HTTPS

###Detect AJAX

###Check if number is odd

###Check if number is even

###Get Current URL

###Get Client IP

###Detect Mobile

###Get Browser

###Get Client Location

###Number To Word conversion

###Seconds To Text

###Minutes To Text

###Hours To Text

###Shorten String

###CURL

###Expand Short URL

###Get Alexa Rank

###Get Google PageRank

###Get Tiny URL

###Get Keyword Suggestions From Google

###WIKI Search

###notification

###Auto Embed

###Make Clickable Links

###Debug



