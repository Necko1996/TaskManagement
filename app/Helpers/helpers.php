<?php

use App\Helpers\ArrayHelper;

if (! function_exists('array_union')) {

    /**
     * Union arrays.
     *
     * @param  array  $array
     * @param  array  $another
     * @param  mixed  $args,...
     * @return array
     */
    function array_union(array $array, array $another, array ...$args)
    {
        return ArrayHelper::union($array, $another, ...$args);
    }
}
