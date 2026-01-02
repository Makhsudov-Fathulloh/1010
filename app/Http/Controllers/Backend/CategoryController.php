<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Search\CategorySearch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchModel = new CategorySearch(new \App\Services\DateFilterService());
        $query = $searchModel->search($request);

        $sort = $request->get('sort');
        if (!empty($sort)) {
            $direction = 'asc';
            if (Str::startsWith($sort, '-')) {
                $direction = 'desc';
                $sort = ltrim($sort, '-');
            }
            if (Schema::hasColumn('category', $sort)) {
                $query->orderBy($sort, $direction);
            }
        }

        $categoryParents = Category::whereNull('parent_id')->pluck('title', 'id');

        $userIds = Category::distinct()->pluck('user_id');
        $users = User::whereIn('id', $userIds)->where('role_id', '!=', \App\Models\Role::where('title', 'Клиент')->value('id'))->pluck('username', 'id');

        $isFiltered = count($request->get('filters', [])) > 0;

        if ($isFiltered) {
            $categoryCount = $query->count();
        } else {
            $categoryCount = Category::count();
        }

        $categories = $query->paginate(20)->withQueryString();

        return view('backend.category.index', compact(
            'categories',
            'categoryParents',
            'users',
            'isFiltered',
            'categoryCount'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $categoryDropdown = Category::getDropdownList();

        return view('backend.category.create', compact('category', 'categoryDropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        $request->validate([
            'parent_id' => 'nullable|exists:category,id',
            'title' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ],
            [
                'title.required' => 'Категория номи мажбурий.',
                'title.string' => 'Категория номи матн бўлиши керак.',
                'title.max' => 'Категория номи 100 белгидан ошмаслиги керак.',
                'image.mimes' => 'Расм JPG, JPEG, PNG ёки WEBP форматида бўлиши шарт.',
                'image.max' => 'Расм ҳажми 5 МБ дан ошмаслиги керак.',
            ]
        );

        $category->parent_id = $request->parent_id;
        $category->title = $request->title;
        $category->subtitle = $request->subtitle;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $path = $request->file('image')->store('files', 'public');

            $file = new \App\Models\File();
            $file->name = $uploadedFile->getClientOriginalName();
            $file->path = $path;
            $file->extension = $uploadedFile->getClientOriginalExtension();
            $file->mime_type = $uploadedFile->getMimeType();
            $file->size = $uploadedFile->getSize();
            $file->date_create = time();
            $file->save();

            $category->image = $file->id;
        }

        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categoryDropdown = Category::getDropdownList();
        return view('backend.category.update', compact('category', 'categoryDropdown'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'parent_id' => 'nullable|exists:category,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ],
            [
                'title.required' => 'Категория номи мажбурий.',
                'title.string' => 'Категория номи матн бўлиши керак.',
                'title.max' => 'Категория номи 100 белгидан ошмаслиги керак.',
                'image.mimes' => 'Расм JPG, JPEG, PNG ёки WEBP форматида бўлиши шарт.',
                'image.max' => 'Расм ҳажми 5 МБ дан ошмаслиги керак.',
            ]
        );

        $category->parent_id = $request->parent_id;
        $category->title = $request->title;
        $category->subtitle = $request->subtitle;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $path = $request->file('image')->store('files', 'public');

            $file = new \App\Models\File();
            $file->name = $uploadedFile->getClientOriginalName();
            $file->path = $path;
            $file->extension = $uploadedFile->getClientOriginalExtension();
            $file->mime_type = $uploadedFile->getMimeType();
            $file->size = $uploadedFile->getSize();
            $file->date_create = time();
            $file->save();

            $category->image = $file->id;
        }
//        $category->user_id = auth()->id();

        $category->save();

        return redirect()->route('category.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->file) {
            Storage::disk('public')->delete($category->file->path);
            $category->file->delete();
        }
        $category->delete();

        return response()->json([
            'message' => 'Категория ўчирилди',
            'redirect' => route('category.index')
        ]);
    }
}
