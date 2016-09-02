<?php

namespace App\Models\BaseModels;

trait BaseModel
{
    /**
     * Must return array with attribute => label
     * @return mixed
     */
    abstract function attributesLabels();

    /**
     * Must return label of attribute or list of labels of attributes – ['attribute' => 'label']
     * @param bool $attribute
     * @return array || string
     */
    function getAttributeLabel($attribute = false)
    {
        $attributes = $this->attributesLabels();
        if(isset($attributes[$attribute])){
            return $attributes[$attribute];
        }
        return $attribute ? $attribute : $attributes;
    }

    function getActiveId($attribute){
        return array_key_exists($attribute, $this->attributes) ? class_basename(__CLASS__).'_'.$attribute : $attribute;
    }

    function getActiveName($attribute, $suffix = ''){
        return array_key_exists($attribute, $this->attributesLabels()) ? class_basename(__CLASS__)."[{$attribute}]{$suffix}" : $attribute;
    }
}
