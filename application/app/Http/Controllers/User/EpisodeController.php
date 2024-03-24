<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeEditRequest;
use App\Models\Category;
use App\Models\CategoryDetails;
use App\Models\Episode;
use App\Models\Subscription;
use Illuminate\Http\Request;
use function PHPUnit\TestFixture\func;
use function Symfony\Component\String\u;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list($course_id)
    {
        $pageTitle = "Episode List";
        $user = auth()->user();
        if(!$user)
        {
            abort(403);
        }
        $episodes = Episode::where('course_id',$course_id)->where('status',1)->get();
        $getID3 = new \getID3;

        return view($this->activeTemplate.'user.episode.list',compact('pageTitle','episodes','course_id','getID3'));
    }

    public function create($course_id)
    {
        $pageTitle = 'Create Episode';
        return view($this->activeTemplate.'user.episode.create',compact('pageTitle','course_id'));
    }


    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $episode = new Episode();
        $episode->course_id = $request->course_id;
        $episode->title = $request->title;
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
        $episode_creator= Episode::with('course')->whereHas('course',function($q){
                            $q->where('creator_id',auth()->user()->id);
                        })->first();
        $creator_id = null;
        if ($episode_creator) {
            $creator_id = optional($episode_creator->course)->creator_id;
        }

        $is_subscribe = Episode::where('id',$id)
                        ->whereHas('course.subscription',function($q){
                            $q->where('user_id',auth()->user()->id);
                        })->first();

        if(($is_subscribe) || ($creator_id == auth()->user()->id))
        {
            $details = Episode::where('id',$id)->first();
            $relateds = Episode::where('id','!=',$id)->where('status',1)->with('course')
                ->whereHas('course',function ($q) use($details){
                    $q->where('id',$details->course_id);
                })->inRandomOrder()->limit(3)->get();
        }
        else
        {
            $notify[] = ['error', 'You need to purchase this course.'];
            return redirect()->back()->withNotify($notify);
        }

        return view($this->activeTemplate.'user.episode.details',compact('pageTitle','details','relateds','creator_id'));
    }

    public function allEpisodes($course_id)
    {
        $pageTitle  = "All Episodes";
        $episodes   = Episode::where('course_id',$course_id)->where('status',1)->get();
        $getID3 = new \getID3;
//        dd($getID3);
        return view($this->activeTemplate.'episodes',compact('pageTitle','episodes','course_id','getID3'));
    }


    public function episodeEdit(EpisodeEditRequest $request)
    {
        $validateData = $request->validated();
        $episode = Episode::where('id',$validateData['id'])->firstOrFail();
        $episode->title = $validateData['title'];
        $episode->file = $validateData['file'];
        $episode->file_link = $request->file_link;
        $episode->description = $validateData['description'];
        $episode->save();
        $notify[] = ['success', $episode->title . ' has been updated successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function destroy(string $id)
    {
        //
    }
}
