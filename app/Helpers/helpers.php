<?php

if (!function_exists('setActive')) {
    function setActive($route)
    {
        return request()->routeIs($route) ? 'bg-gray-200' : 'hover:bg-gray-200';
    }
}