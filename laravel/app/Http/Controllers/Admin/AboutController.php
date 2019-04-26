<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        //        $users=DB::table('users')->get();
                $abouts = About::paginate(3);
                return view('admin.about.index', ['abouts' => $abouts]);
     }

        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create() {
                return view('admin.about.create');
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
                    'icon' => 'required|min:6',
                        ], [
                    'title.required' => 'The title field is required.',
                    'title.min' => 'The title must be at least 5 characters.',
                    'title.max' => 'The title may not be greater than 35 characters.',
                    'content.required' => 'The content field is required.',
                    'content.min' => 'The content must be at least 5 characters.',
                    'content.max' => 'The content may not be greater than 500 characters.',
                    'icon.required' => 'The icon field is required.',
                    'icon.min' => 'The icon must be at least 6 characters.',
                ]);
                $input = $request->all();
                About::create($input);
                return redirect('admin/about')->with('success','The about has created!');
            }
        
            /**
             * Display the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id) {
                //
            }
        
            /**
             * Show the form for editing the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function edit($id) {
                $about = About::findOrFail($id);
                return view('admin.about.edit',['about'=>$about]);
            }
        
            /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function update(Request $request, $id) {
                $about = About::findOrFail($id);
                $this->validate($request, [
                    'title' => 'required|min:5|max:35',
                    'content' => 'required|min:5|max:500',
                    'icon' => 'required|min:6',
                        ], [
                    'title.required' => 'The title field is required.',
                    'title.min' => 'The title must be at least 5 characters.',
                    'title.max' => 'The title may not be greater than 35 characters.',
                    'content.required' => 'The content field is required.',
                    'content.min' => 'The content must be at least 5 characters.',
                    'content.max' => 'The content may not be greater than 500 characters.',
                    'icon.required' => 'The icon field is required.',
                    'icon.min' => 'The icon must be at least 6 characters.',
                ]);
                $input = $request->all();
               $about->update($input);
               return redirect('admin/about')->with('success','The about has edited!');
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id) {
               $abouts = About:: findOrFail($id);
               $abouts->delete();
               return redirect('/admin/about')->with('success','The about has deleted!');
            }
}
