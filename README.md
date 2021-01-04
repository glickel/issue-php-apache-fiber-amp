# Purpose
This repository is an example of an issue with php/apache + fiber + amp-v3

# Warning
This docker-compose configuration will use the port 8001

# Install

- git clone ...
- docker-compose build
- docker-compose up -d
- docker-compose exec php-apache composer install

# Reproduce error

Call multiple times the url `localhost:8001`, with `curl` for example.
Normally you should have this response:
```
array(3) {
  [0]=>
  string(4) "toto"
  [1]=>
  string(6) "toto 2"
  [2]=>
  string(6) "toto 3"
}
```

But some times you will have this one:
```
<br />
<b>Fatal error</b>:  Uncaught FiberError: Cannot call Fiber::this() within a fiber scheduler in /var/www/html/vendor/amphp/amp/lib/functions.php:28
Stack trace:
#0 /var/www/html/vendor/amphp/amp/lib/functions.php(28): Fiber::this()
#1 /var/www/html/public/index.php(8): Amp\await(Object(Amp\Internal\PrivatePromise))
#2 {main}
  thrown in <b>/var/www/html/vendor/amphp/amp/lib/functions.php</b> on line <b>28</b><br />
```