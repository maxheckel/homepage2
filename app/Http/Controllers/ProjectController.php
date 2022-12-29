<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use League\CommonMark\Normalizer\SlugNormalizer;
use League\CommonMark\Normalizer\UniqueSlugNormalizer;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('Projects');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Dashboard/Projects/CreateEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $this->storeOrUpdateProject($request, $project);

        session()->flash('flash.banner', 'Project created!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard.projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return Inertia::render('Dashboard/Projects/CreateEdit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $this->storeOrUpdateProject($request, $project);
        session()->flash('flash.banner', 'Project updated!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard.projects.edit', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        session()->flash('flash.banner', 'Project deleted!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard.projects');
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return void
     */
    protected function storeOrUpdateProject(Request $request, Project $project): void
    {
        $project->title = $request->get('title');
        $project->github = $request->get('github');
        $project->live_url = $request->get('live');
        $project->content = $request->get('content');
        if (!$request->get('saveOnly')){
            $project->published_at = Carbon::now();
        }
        if ($request->get('unpublish')){
            $project->published_at = null;
        }
        $slug = new SlugNormalizer();
        $project->slug = $slug->normalize($request->get('title'));
        /** @var UploadedFile $thumbnail */
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail != null) {
            $thumbnail->storePublicly('', 'public_uploads');
            $project->thumb_image_url = $thumbnail->hashName();
        }
        $project->save();
    }
}
