php artisan vendor:publish --tag=toast

# bindeveloperz-toast
---
# Easy Flash Toast Messages for Your Laravel App

This composer package offers a Twitter Bootstrap 4 optimized flash toast messaging setup for your Laravel 5 applications.

## Installation

In config/app.php


```php

 'providers' => [
    ...,
    Bindeveloperz\Toast\ToastServiceProvider::class,
],

 'aliases' => [
    ...,
    'Toast' => Bindeveloperz\Toast\Facades\Toast::class,
 ]


```


## Usage

Within your controllers, before you perform a redirect, make a call to the Toast Facade

```php
public function store()
{
    Toast::success("hello world")->close();

    return home();
}
```


In Template:

```html
    <!-- in head -->
    {{--Toast--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/toast/css/toastr.css') }}">
    

{{--toast--}}
<script src="{{ asset('vendor/toast/js/toastr.min.js') }}"></script>
@include('toast::script')
```

