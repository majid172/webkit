<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryDetails;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $pageTitle = "Episode List";
        $user = auth()->user();
        if($user->user_type)
        {
            $episodes = Episode::with('categoryDetails')
                        ->whereHas('categoryDetails', function ($q) use ($user) {
                            $q->where('creator_id', $user->id);
                        })->get();
         
        }
        
        return view($this->activeTemplate.'user.episode.list',compact('pageTitle','episodes'));
    }

    public function create()
    {
        $pageTitle = 'Create Episode';
        $categories = Category::where('status',1)->get();
        return view($this->activeTemplate.'user.episode.create',compact('pageTitle','categories'));
    }

    
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $categoryDetails = new CategoryDetails();
        $categoryDetails->creator_id = $user_id;
        $categoryDetails->category_id = $request->category_id;
        $categoryDetails->save();

        $episode = new Episode();
        $episode->cat_details_id = $categoryDetails->id;
        $episode->title = $request->title;
        $episode->price = $request->price;
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
        $pageTitle  = 'Episode Details';
        $details    = Episode::where('id',$id)->first();
        $relateds   = Episode::where('id','!=',$id)
                        ->with('category')->limit(3)->get();
        return view($this->activeTemplate.'user.episode.details',compact('pageTitle','details'));
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
