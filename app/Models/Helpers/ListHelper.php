<?php

namespace App\Models\Helpers;
use Illuminate\Database\Eloquent\Collection;

class ListHelper
{
    /**
     * Преобразовать данные для
     * @param Collection $objects
     * @param $template
     * @return array
     */
    static public function makeList(Collection $objects, $template)
    {
        if(empty($objects) || empty($template))
            return [];
        $value   = reset($template);
        $key     = key($template);
        $list    = [];
        foreach ($objects as $object) {
            $attributes = $object->getAttributes();
            if(isset($attributes[$key])){
                $list[$attributes[$key]] = $attributes[$value];
            }
        }
        return $list;
    }
}