<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        return view('Blogs.index');
    }

    public function addBlog()
    {
        return view('Blogs.add');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'introduction' => 'required',
            'body' => 'required',
            'conclusion' => 'required'
        ]);
        $data['metadata'] = auth()->user()->name;

        //Blog::create($data);
        // IT WORKS TILL HERE

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $file_name = 'blog_image-'.Carbon::now().'.'.$image->getClientOriginalExtension();

            // save in path
            //$path = $image->storeAs('public/Blog_images', $file_name);
            //dd($path);
            //Todo fix the path issue it's bringing errors
            //Todo upload the filepath in DB
        }
        //return 'success';
    }
}
