<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Service;
use App\Portfolio;

class CategoryController extends Controller
{
    public function index() {
        //        $users=DB::table('users')->get();
                $categories = Category::paginate(3);
                return view('admin.category.index', ['categories' => $categories]);
            }

        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create() {
                return view('admin.category.create');
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
                    'content' => 'required|min:10|max:500',
                    'icon' => 'required|min:6',
                        ], [
                    'title.required' => 'The title field is required.',
                    'title.min' => 'The title must be at least 5 characters.',
                    'title.max' => 'The title may not be greater than 35 characters.',
                    'content.required' => 'The content field is required.',
                    'content.min' => 'The content must be at least 10 characters.',
                    'content.max' => 'The content may not be greater than 500 characters.',
                    'icon.required' => 'The icon field is required.',
                    'icon.min' => 'The icon must be at least 6 characters.',
                ]);
                $input = $request->all();
                Category::create($input);
                return redirect('admin/category')->with('success','The category has created!');
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
                $category = Category::findOrFail($id);
                return view('admin.category.edit',['category'=>$category]);
            }
        
            /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function update(Request $request, $id) {
                $category = Category::findOrFail($id);
                $this->validate($request, [
                    'title' => 'required|min:5|max:35',
                    'content' => 'required|min:10|max:500',
                    'icon' => 'required|min:6',
                        ], [
                    'title.required' => 'The title field is required.',
                    'title.min' => 'The title must be at least 5 characters.',
                    'title.max' => 'The title may not be greater than 35 characters.',
                    'content.required' => 'The content field is required.',
                    'content.min' => 'The content must be at least 10 characters.',
                    'content.max' => 'The content may not be greater than 500 characters.',
                    'icon.required' => 'The icon field is required.',
                    'icon.min' => 'The icon must be at least 6 characters.',
                ]);
                $input = $request->all();
               $category->update($input);
               return redirect('admin/category')->with('success','The category has edited!');
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id) {
                $category = Category:: findOrFail($id);
                $services = Service::where('category_id',$id)->delete();
                $portfolios = Portfolio::where('category_id',$id)->delete();
                
                $category->delete();
                return redirect('/admin/category')->with('success','The category has deleted!');

            }
}
