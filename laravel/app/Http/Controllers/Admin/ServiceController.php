<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        //        $users=DB::table('users')->get();
                $data = Service::paginate(2);
                return view('admin.service.index', ['data' => $data]);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create() {
                $categories = Category::all();
                return view('admin.service.create', ['categories' => $categories]);
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

                Service::create($input);
                return redirect('admin/service')->with('success','The service has created!');
            }
        
            /**
             * Display the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id) {
                $service = Service::findOrFail($id);
                $categories = Category::pluck('title', 'id')->all();
                return view('admin.service.read',['service'=>$service, 'categories'=>$categories]);
            }
        
            /**
             * Show the form for editing the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function edit($id) {
                $service = Service::findOrFail($id);
                $categories = Category::pluck('title', 'id')->all();
                return view('admin.service.edit',['service'=>$service, 'categories'=>$categories]);
            }
        
            /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function update(Request $request, $id) {
               $service = Service:: findOrFail($id);
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
               $service->update($input);
               return redirect('admin/service')->with('success','The service has edited!');
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id) {
               $service = Service:: findOrFail($id);
               $service->delete();
               return redirect('/admin/service')->with('success','The service has deleted!');
            }
            public function deleteAll(Request $request)
            {
                $ids = $request->ids;
                //dd($ids);
                DB::table("services")->whereIn('id',explode(",",$ids))->delete();
                return response()->json(['success'=>"Services Deleted successfully."]);
            }

            function fetch_data(Request $request)
            {
                if($request->ajax())
                {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $query = $request->get('query');
                    $query = str_replace(" ", "%", $query);
                    $data = Service::with('category')
                        ->where('id', 'like', '%'.$query.'%')
                        ->orWhere('title', 'like', '%'.$query.'%')
                        ->orWhere('content', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(2);
                    return view('admin.service.pagination_data', compact('data'))->render();
                }else{
                    return response()->json(['success'=>"Services Deleted successfully."]);
                }
            }
            
}
