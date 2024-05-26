<?php

/*
    Number of Request that could be sent with specified time types 
    Example: per minute, per hour, 
    config should be preceeded by request_ time type 
*/
return [
    'requests_per_minute' => env('REQUEST_LIMIT', 10)
];
