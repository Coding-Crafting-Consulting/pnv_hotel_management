<?php

use Illuminate\Support\Facades\Auth;


function myLayoutHelperSidebarActions() {

  return [
    
    [
      "url"             =>  "bookingPurposes",
      "label"           =>  "Booking purposes",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "bookingTypes",
      "label"           =>  "Booking types",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "companies",
      "label"           =>  "Companies",
      "mayBeDisplayed"  =>  true
    ],

    [
      "url"             =>  "countries",
      "label"           =>  "Countries",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "dishTypes",
      "label"           =>  "Dish categories",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "dishes",
      "label"           =>  "Dishes",
      "mayBeDisplayed"  =>  true 
    ],

    [
      "url"             =>  "equipment",
      "label"           =>  "Equipment",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "identificationTypes",
      "label"           =>  "Identification types",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "onlinePlateforms",
      "label"           =>  "Online booking plateforms",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "roomSizes",
      "label"           =>  "Room sizes",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "rooms",
      "label"           =>  "Rooms",
      "mayBeDisplayed"  =>  true
    ],

    [
      "url"             =>  "titles",
      "label"           =>  "Titles",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "userTypes",
      "label"           =>  "User categories",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "users",
      "label"           =>  "Users",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [
      "url"             =>  "vipCards",
      "label"           =>  "VIP cards",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],
  
    [ 
      "url"             =>  "customerMessages",
      "label"           =>  "Customer messages",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ],

    [ 
      "url"             =>  "bookings",
      "label"           =>  "Reservations",
      "mayBeDisplayed"  =>  Auth::check() && Auth::user()->hasAdminRights() 
    ]

  ];

}