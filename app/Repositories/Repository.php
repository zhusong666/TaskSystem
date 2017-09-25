<?php

namespace App\Repositories;

use App\Project;
use Auth;
use Image;

class Repository{

    public function newStore($request)
    {
        Auth::user()->projects()->create([

            'name' => $request->input('name'),

            'thumbnail' => $this->storeImage($request),
        ]);
    }

    public function storeImage($request)
    {
        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');

            $name = str_random(10).'.jpg';

            $path = public_path() . '/thumbnail/'.$name;

            Image::make($file)->resize(261,98)->encode('jpg')->save($path);

            return $name;
        }
    }

    public function editProject($request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        if($request->hasFile('thumbnail')){
            $project->thumbnail = $this->storeImage($request);
        }
        $project->save();
    }
}