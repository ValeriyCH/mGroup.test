<?php
namespace App\Validators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;
class ProjectValidator extends Model
{
    private $rules = array(
        'name' => 'required|',
//        'size'  => 'required',
        // .. more rules here ..
    );

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors;
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}