<?php
namespace App\Interfaces;
interface IModel
{
    /**
     * Must return label of attribute or list of labels of attributes – ['attribute' => 'label']
     * @param bool $attribute
     * @return array || string
     */
    function getAttributeLabel($attribute = false);
}