<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() {
        //        $users=DB::table('users')->get();
                $portfolios = Portfolio::paginate(3);
                return view('admin.portfolio.index', ['portfolios' => $portfolios]);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create() {
                $categories = Category::all();
                return view('admin.portfolio.create', ['categories' => $categories]);
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
                    'image'  => 'required|image',
                    'category_id',
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

                Portfolio::create($input);
                return redirect('admin/portfolio')->with('success','The portfolio has created!');
            }
        
            /**
             * Display the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id) {
                $portfolio = Portfolio::findOrFail($id);
                $categories = Category::all();
                return view('admin.portfolio.read',['portfolio'=>$portfolio, 'categories'=>$categories]);
            }
        
            /**
             * Show the form for editing the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function edit($id) {
                $portfolio = Portfolio::findOrFail($id);
                $categories = Category::all();
                return view('admin.portfolio.edit',['portfolio'=>$portfolio, 'categories'=>$categories]);
            }
        
            /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function update(Request $request, $id) {
               $portfolio = Portfolio:: findOrFail($id);
               $this->validate($request, [
                'title' => 'required|min:5|max:35',
                'content' => 'required|min:5|max:500',
                'category_id',
                'image',
                    ], [
                'title.required' => 'The title field is required.',
                'title.min' => 'The title must be at least 5 characters.',
                'title.max' => 'The title may not be greater than 35 characters.',
                'content.required' => 'The content field is required.',
                'content.min' => 'The content must be at least 5 characters.',
                'content.max' => 'The content may not be greater than 500 characters.',
            ]);

            $input = $request->all();
            if ($request->hasFile('image')) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->image->move('images/', $filename);
                $input['image'] = 'images/' . $filename;
            }
               $portfolio->update($input);
               return redirect('admin/portfolio')->with('success','The portfolio has edited!');
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id) {
               $portfolio = Portfolio:: findOrFail($id);
               $portfolio->delete();
               return redirect('/admin/portfolio')->with('success','The portfolio has deleted!');
            }
           
}
