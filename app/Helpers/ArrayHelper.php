<?php

namespace App\Helpers;

class ArrayHelper
{
    /**
     * Union arrays.
     *
     * @param  array  $array
     * @param  array  $another
     * @param  mixed  $args,...
     * @return array
     */
    public static function union(array $array, array $another, array ...$args)
    {
        $union = $array + $another;

        if (count($args) > 0) {
            foreach ($args as $arg) {
                $union += $arg;
            }
        }

        return $union;
    }
}
