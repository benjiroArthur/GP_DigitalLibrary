<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Group;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('LibraryManager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        //6return $categories;
        return view('manager.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        if($request->hasFile('cover_image'))
        {

        $image_file = $request->cover_image;

        $imageNameWithExt = $image_file->getClientOriginalName();

        //Get just filename
        $image_name = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
        $image_name = $request->input('name');
            $image_name= str::title($image_name);
            $image_name = str_replace(' ', '', $image_name);

        //Get just extension
        $extension = $image_file->getClientOriginalExtension();

        //Filename to store
        $imageNameToStore = $image_name.'_'.time().'.'.$extension;



        //upload file

        $path = $image_file->storeAs('public/images/cover/', $imageNameToStore);

        $image_path = public_path('images/cover/'.$imageNameToStore);
        //resize image
        Image::make($image_file->getRealPath())->resize(400,250)->save($image_path);


    }

        $category = new Category;
        $data = $request->except('cover_image');
        if($request->hasFile('cover_image'))
        {
            $data['cover_image'] = $imageNameToStore;
        }
        $category->create($data);

        return redirect()->back()->with('success', 'Category Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        return view('manager.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('manager.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('cover_image'))
        {

            $image_file = $request->cover_image;

            $imageNameWithExt = $image_file->getClientOriginalName();

            //Get just filename
            $image_name = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $image_name = $request->input('name');
            $image_name= str::title($image_name);
            $image_name = str_replace(' ', '', $image_name);

            //Get just extension
            $extension = $image_file->getClientOriginalExtension();

            //Filename to store
            $imageNameToStore = $image_name.'_'.time().'.'.$extension;



            //upload file

            $path = $image_file->storeAs('public/images/cover/', $imageNameToStore);

            $image_path = public_path('images/cover/'.$imageNameToStore);
            //resize image
            Image::make($image_file->getRealPath())->resize(400,250)->save($image_path);


        }
        $category = Category::find($id);
       $category->name = $request->input('name');

        if ($request->hasFile('cover_image'))
        {
            $category->cover_image = $imageNameToStore;
        }

        $category->save();
        return redirect('/manager/category')->with('success','Category Records Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
       $groups = Group::where('category_id', $category->id)->get();
        foreach ($groups as $group)
        {
            $books = Book::where('group_id', $group->id)->get();
            foreach ($books as $book)
            {
                $book->delete();
            }
        }


        foreach ($groups as $group)
        {
            $group->delete();
        }
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
