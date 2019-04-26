<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Blog;
use Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        //        $users=DB::table('users')->get();
                $blogs = Blog::paginate(3);
                return view('admin.blog.index', ['blogs' => $blogs]);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create() {
                $blogs = Blog::all();
                return view('admin.blog.create', ['blogs' => $blogs]);
            }
        
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function store(Request $request) {
                $this->validate($request, [
                    'title' => 'required|min:5|max:35',
                    'content' => 'required|min:5|max:500',
                    'user_id',
                    'image'=>'required',
                        ], [
                    'title.required' => 'The title field is required.',
                    'title.min' => 'The title must be at least 5 characters.',
                    'title.max' => 'The title may not be greater than 35 characters.',
                    'content.required' => 'The content field is required.',
                    'content.min' => 'The content must be at least 5 characters.',
                    'content.max' => 'The content may not be greater than 500 characters.',
                    'image.required' => 'The image field is required.',
                ]);
                
                $input = $request->all();
                if ($request->hasFile('image')) {
                    $filename = $request->file('image')->getClientOriginalName();
                    $request->image->move('images/', $filename);
                    $input['image'] = 'images/' . $filename;
                }
                $input['user_id']= Auth::user()->id;
                Blog::create($input);
                return redirect('admin/blog')->with('success','The blog has created!');
            }
        
            /**
             * Display the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id) {
                $blog = Blog::findOrFail($id);
                return view('admin.blog.read',['blog'=>$blog]);
            }
        
            /**
             * Show the form for editing the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function edit($id) {
                $blog = Blog::findOrFail($id);
                return view('admin.blog.edit',['blog'=>$blog]);
            }
        
            /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function update(Request $request, $id) {
               $blog = Blog:: findOrFail($id);
               $this->validate($request, [
                'title' => 'required|min:5|max:35',
                'content' => 'required|min:5|max:500',
                'image',
                'user_id',
                    ], [
                'title.required' => 'The title field is required.',
                'title.min' => 'The title must be at least 5 characters.',
                'title.max' => 'The title may not be greater than 35 characters.',
                'content.required' => 'The content field is required.',
                'image.required' => 'The image field is required.',
                'content.min' => 'The content must be at least 5 characters.',
                'content.max' => 'The content may not be greater than 500 characters.',
            ]);
            
            $input = $request->all();
            if ($request->hasFile('image')) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->image->move('images/', $filename);
                $input['image'] = 'images/' . $filename;
            }
            $input['user_id']= Auth::user()->id;
               $blog->update($input);
               return redirect('admin/blog')->with('success','The blog has edited!');
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id) {
               $blog = Blog:: findOrFail($id);
               $blog->delete();
               return redirect('/admin/blog')->with('success','The blog has deleted!');
            }
}
