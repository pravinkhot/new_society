<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Society ID
    |--------------------------------------------------------------------------
    |
    | This value contain Society ID
    |
    */
    'society_id',

    /*
    |--------------------------------------------------------------------------
    | Subdomain Name
    |--------------------------------------------------------------------------
    |
    | This value contain name of subdomain
    |
    */
    'subdomain' => null,

    /*
    |--------------------------------------------------------------------------
    | Default pagination
    |--------------------------------------------------------------------------
    |
    | This value contain default pagination count
    |
    */
    'defaultPaginationCount' => 10,

    /*
    |--------------------------------------------------------------------------
    | Default orderBy
    |--------------------------------------------------------------------------
    |
    | This value contain default order by column name and type
    |
    */
    'defaultOrderByForList' => [
        'type' => 'DESC',
        'columnName' => 'created_at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default date format
    |--------------------------------------------------------------------------
    |
    | This value contain date format showing to user
    |
    */
    'defaultDateFormat' => 'd-m-Y',

    /*
    |--------------------------------------------------------------------------
    | Default date format
    |--------------------------------------------------------------------------
    |
    | This value contain date time format showing to user
    |
    */
    'defaultDateTimeFormat' => 'd-m-Y g:i A',

    /*
    |--------------------------------------------------------------------------
    | Default no result found string
    |--------------------------------------------------------------------------
    |
    | This value contain string that we have to show when show list contain no result 
    |
    */
    'noResultFoundString' => 'No result found.',
];