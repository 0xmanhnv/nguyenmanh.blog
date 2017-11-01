<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'sammyk/laravel-facebook-sdk' => 
  array (
    'providers' => 
    array (
      0 => 'SammyK\\LaravelFacebookSdk\\LaravelFacebookSdkServiceProvider',
    ),
    'aliases' => 
    array (
      'Facebook' => 'SammyK\\LaravelFacebookSdk\\FacebookFacade',
    ),
  ),
);