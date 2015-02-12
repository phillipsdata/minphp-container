# minphp/Container

[![Build Status](https://travis-ci.org/phillipsdata/minphp-container.svg?branch=master)](https://travis-ci.org/phillipsdata/minphp-container)

A [standards compliant](https://github.com/container-interop/container-interop/) [Pimple](https://github.com/silexphp/Pimple)-based container.

## Installation

Install via composer:

```sh
composer install minphp/container:~1.0
```

## Basic Usage

```php
<?php
use minphp\Container\Container;

$container = new Container();

// Add/Update
$container->set('queue', function($c) {
    return new \SplQueue();
});

// Verify
$queue_exists = $container->has('queue');

// Fetch
$queue = $container->get('queue');

// Remove
$container->remove('queue');

```

You can also use the container as an array, as per Pimple. Though, using the **ContainerInterface** defined methods is preferable as it eases switching to a different container ifyou ever need to.

```php
<?php
use minphp\Container\Container;

$container = new Container();
$container['queue'] = function($c) {
    return new \SplQueue();
};

$queue = $container['queue'];
```


### ContainerInterface

```php
interface ContainerInterface
{
    // inherited from Interop\Container\ContainerInterface
    public function get($id);
    
    // inherited from Interop\Container\ContainerInterface
    public function has($id);
    
    public function set($id, $value);
    
    public function remove($id);
}
```

### ContainerAwareInterface

Also provided is the **ContainerAwareInterface**, which allows your classes to declare that they support container injection. Nifty for granting objects access to your container (you weren't thinking of using a static class, were you?).

```php
interface ContainerAwareInterface
{
    public function setContainer(minphp\Container\ContainerInterface $container = null);
    
    public function getContainer();
}
```

#### Usage

```php
<?php
namespace myApp\Controller;

use minphp\Container\ContainerAwareInterface;
use minphp\Container\ContainerInterface;

class MyController implements ContainerAwareInterface
{
    private $container = null;
    
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }
}

```
