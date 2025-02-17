<?php

if (!function_exists('setActive')) {
    function setActive($route)
    {
        return request()->routeIs($route) ? 'bg-gray-500' : 'hover:bg-gray-500';
    }
}