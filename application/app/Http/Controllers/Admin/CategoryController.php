<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Episode;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $pageTitle = 'Category List';
        $lists = Category::paginate();
        return view('admin.category.list',compact('pageTitle','lists'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string|min:3',
            'image' => ['required','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasFile('image')){
            try {
                $directory = date("Y")."/".date("m");
                $path       = getFilePath('category').'/'.$directory;
                $size = getFileSize('category');
                $image = fileUploader($request->image, $path,$size);
                $category->image = $image;
                $category->path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $category->save();
        $notify[] = ['success', $category->name . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'image' =>  ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ]);
        $category =  Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;

        if($request->hasFile('image')){
            try {
                $directory = date("Y")."/".date("m");
                $path       = getFilePath('category').'/'.$directory;
                $size = getFileSize('category');
                $image = fileUploader($request->image, $path,$size);
                $category->image = $image;
                $category->path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $category->save();
        $notify[] = ['success', $category->name . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);
    }
    public function remove(Request $request)
    {
        $course = Category::find($request->id);
        $course->delete();
        return redirect()->back();
    }

    public function episodeList($category_id)
    {
        $data['pageTitle'] = 'Episode List';
        $data['episodes'] = Episode::where('category_id',$category_id)->paginate(getPaginate());
        return view('admin.episode.list',$data,compact('category_id')); 
    }
}
