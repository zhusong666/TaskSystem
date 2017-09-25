<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Intervention\Image\Facades\Image as Image;

use App\Repositories\Repository;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use Illuminate\Support\Facades\Redirect;
class ProjectController extends Controller
{
    protected $Repo;

    public function __construct(Repository $repo)
    {
        $this->Repo = $repo;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->Repo->newStore($request);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_id = $id;
        $pro = Auth::user()->projects()->where('id',$id)->first();
        $todo = $pro->tasks()->where('completed',0)->orderBy('created_at','desc')->get();
        $done = $pro->tasks()->where('completed',1)->orderBy('created_at','desc')->get();
        return view('task',compact('project_id','todo','done'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, $id)
    {
        $this->Repo->editProject($request, $id);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id',$id)->delete();
        return 1;
    }


}
