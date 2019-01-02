# bindeveloperz-alert
Inspired by laracast alert package
---
# Easy Flash Messages for Your Laravel App

This composer package offers a Twitter Bootstrap 4 optimized flash messaging setup for your Laravel 5 applications.

## Installation

In config/app.php


```php

 'providers' => [
    ...,
    Bindeveloperz\Alert\AlertServiceProvider::class,
],

 'aliases' => [
    ...,
    'Alert' => Bindeveloperz\Alert\Facades\Alert::class,
 ]


```


## Usage

Within your controllers, before you perform a redirect, make a call to the Alert Facade

```php
public function store()
{
    Alert::success("hello world")->close();

    return home();
}
```


In Template:

```html
@include('alert::message')
```

