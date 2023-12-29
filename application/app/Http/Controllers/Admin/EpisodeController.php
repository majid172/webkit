<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category_id)
    {
        $pageTitle = "Create Episode";
        $category = Category::where('id',$category_id)->first();
        return view('admin.episode.create',compact('pageTitle','category_id','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required'
        ]);
        $episode = new Episode();
        $episode->title = $request->title; 
        $episode->category_id = $request->category_id; 
        $episode->file_link = $request->file_link; 
        if($request->hasFile('file')){
            try {
                $directory = date("Y")."/".date("m");
                $path      = getFilePath('episode').'/'.$directory;
                // $size = getFileSize('episode');
                $file = fileUploader($request->file, $path);
                $episode->file = $file;
                $episode->file_path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your episode file'];
                return back()->withNotify($notify);
            }
        }
        $episode->description = $request->description; 
        $episode->save();
        $notify[] = ['success', $episode->title . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);
    }

    /**
     * Display the specified resource.
     */
    public function details($id)
    {
        
        $details = Episode::where('id',$id)->firstOrFail();
        $pageTitle = $details->title." "."details";
        return view('admin.episode.details',compact('pageTitle','details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
