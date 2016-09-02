<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;

class Project extends Model
{
    use BaseModels\BaseModel;
    private $people_count_values = [
        2 => 2, 4 => 4, 6 => 6
    ];
    private $time_line_values = [
        2 => 2, 4 => 4, 6 => 6
    ];

    public function talent()
    {
        return $this->belongsTo('App\Models\Talents', 'talent_id', 'id');
    }

    public function getPeopleCountValues()
    {
        return $this->people_count_values;
    }

    public function getTimeLineValues()
    {
        return $this->time_line_values;
    }

    function attributesLabels()
    {
        //TODO: translate
        return $attributes = [
            'name' => 'Project name',
            'role_id' => 'Who are you?',
            'people_count' => 'Number of people for the project',
            'talent_id' => 'What talent are you looking for?',
            'date_start' => 'When do you need to start the project?',
            'talent' => 'Talent',
            'date_start_show' => 'Timeline',
        ];
    }

    function showData()
    {
        return [
            $this->getAttributeLabel('name') => $this->getAttribute('name'),
            $this->getAttributeLabel('people_count') => $this->getAttribute('people_count'),
            $this->getAttributeLabel('talent') => $this->talent->name,
            $this->getAttributeLabel('date_start_show') => $this->getAttribute('date_start'),
        ];
    }
}
