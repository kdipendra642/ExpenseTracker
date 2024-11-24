<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Services\CategoryService;
use App\Services\ExpenseService;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    protected $expenseService;
    protected $categoryService;

    public function __construct(
        ExpenseService $expenseService,
        CategoryService $categoryService
    ) {
        $this->expenseService = $expenseService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $filterable = $request->query();
           $expenses = $this->expenseService->getAllExpenses($filterable);
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }

        return view('backend.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCategory();
        return view('backend.expenses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $this->expenseService->storeExpense($data);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }

        DB::commit();

        return redirect()->route('expenses.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $expenses = $this->expenseService->getExpenseById($id);
            $categories = $this->categoryService->getAllCategory();
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }
        return view('backend.expenses.edit', compact('expenses', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, int $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            $this->expenseService->updateExpense($id, $data);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }

        DB::commit();

        return redirect()->route('expenses.index');
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
           $this->expenseService->deleteExpense($id);
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }

        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadExpense()
    {
        try {
           $expenses = $this->expenseService->getAllExpenses();

           $pdf = Pdf::loadView('backend.expenses.pdf', compact('expenses'));
        } catch (Exception $exception) {
            $exception->getMessage();
            return redirect()->back();
        }

        return $pdf->download('expenses.pdf');
    }
}
