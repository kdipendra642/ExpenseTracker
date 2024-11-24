<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
           $categories = $this->categoryService->getAllCategory();
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }

        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $this->categoryService->storeCategory($data);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }

        DB::commit();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     try {
    //         $categories = $this->categoryService->getCategoryById($id);
    //     } catch (Exception $exception) {
    //         $exception->getMessage();
    //         return redirect()->back();
    //     }

    //     return view('', compact([
    //         'categories' => $categories
    //     ]));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = $this->categoryService->getCategoryById($id);
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }
        return view('backend.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, int $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $this->categoryService->updateCategory($id, $data);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }

        DB::commit();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->categoryService->deleteCategory($id);
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }

        return redirect()->route('categories.index');
    }
}
