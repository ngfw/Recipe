# Recipe
####Collection of PHP Functions


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

### 





#### More examples coming soon...


