<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('Blogs.index', compact('blogs'));
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

        if ($request->hasFile('image'))
        {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();

            // save in path
            $request->file('image')->storeAs($destination_path, $file_name);

            // add to array
            $data['image'] = $file_name;
        }
        // save all to DB
        Blog::create($data);

        return 'success';
    }
}
