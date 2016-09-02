<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Helpers\ListHelper;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Project;
use App\Models\Roles;
use App\Models\Talents;
use Illuminate\Support\Facades\Session;
use Seld\JsonLint\JsonParser;


class IndexController extends Controller
{

    public function index()
    {
        $user_model = new User();
        $project_model = new Project();

        $lists_data['people_count'] = $project_model->getPeopleCountValues();
        $lists_data['talent_id'] = ListHelper::makeList(Talents::all(), ['id' => 'name']);
        $lists_data['role_id'] = ListHelper::makeList(Roles::all(), ['id' => 'name']);
        $lists_data['date_start'] = $project_model->getTimeLineValues();

        $comments = Comments::getComments();
        return view('index.index', [
            'lists_data' => $lists_data,
            'project_model' => $project_model,
            'user_model' => $user_model,
            'comments' => $comments,
        ]);
    }

    // FIXME: do refactor in validate_model & store!
    public function validate_model(ProjectRequest $request)
    {
        $project_model = new Project();
        $attributes = $request->input();
        unset($attributes['_token']);
        if (!Auth::check()) {
            Session::put('project_model', $attributes);
            return response()->json(['done' => true, 'message' => 'model is valid']);
        }
        $project_model->setRawAttributes($attributes);
        $project_model->save();
        $model_data = $project_model->showData();
        return response()->json(['done' => true, 'auth' => Auth::check(), 'message' => 'Project is created!', 'model_data' => $model_data]);
    }

    public function store()
    {
        $project_model = new Project();
        $session_data = Session::get('project_model');
        if (!isset($session_data)) {
            return response()->json(['done' => false, 'message' => 'Please, fill the form!']);
        }
        foreach (Session::pull('project_model') as $key => $item) {
            $project_model->setAttribute($key, $item);
        }
        if (Auth::check()) {
            $project_model->setAttribute('user_id', Auth::user()->id);
            $project_model->save();
            $model_data = $project_model->showData();
            return response()->json(['done' => true, 'message' => 'Project is created!', 'model_data' => $model_data]);
        }
    }
}
