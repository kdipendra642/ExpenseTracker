<?php

namespace App\Services;

use App\Repositories\Interfaces\ExpenseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseService
{
    protected $expenseRepository;

    public function __construct(ExpenseRepositoryInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * List All Expenses
     */
    public function getAllExpenses(array $filterable = []): object
    {
        $conditions = [['userId', '=', Auth::user()->id]];

        if (isset($filterable['filterDate'])) {
            list($year, $week) = explode('-W', $filterable['filterDate']);

            $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek();
            $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek();

            $conditions[] = ['created_at', '>=', $startDate];
            $conditions[] = ['created_at', '<=', $endDate];
        }

        return $this->expenseRepository->fetchAll(
            ['category'], 
            $conditions 
        );
    }

    /**
     * Store Expense
     */
    public function storeExpense(array $data): void
    {
        $this->expenseRepository->store($data);
    }

    /**
     * Get Expense By ID
     */
    public function getExpenseById(int $id): object
    {
        return $this->expenseRepository->fetch($id, [
            'category'
        ]);
    }

    /**
     * Update Expense
     */
    public function updateExpense(int $id, array $data): void
    {
        $this->expenseRepository->update(
            $data,
            $id
        );
    }

    /**
     * Delete Expense
     */
    public function deleteExpense(int $id): void
    {
        $this->expenseRepository->delete($id);
    }
}
