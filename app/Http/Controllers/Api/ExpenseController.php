<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ExpenseService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(
        ExpenseService $expenseService
    ) {
        $this->expenseService = $expenseService;
    }

    /**
     * @OA\PathItem(
     *     path="/myexpenses/{email}",
     *     @OA\Get(
     *         summary="Get a list of expenses for a specific user by email",
     *         tags={"Expenses"},
     *         @OA\Parameter(
     *             name="email",
     *             in="path",
     *             description="The email of the user to fetch expenses for",
     *             required=true,
     *             @OA\Schema(type="string")
     *         ),
     *         @OA\Response(
     *             response=200,
     *             description="List of expenses returned successfully",
     *             @OA\JsonContent(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Expense")
     *             )
     *         ),
     *         @OA\Response(
     *             response=400,
     *             description="Invalid request"
     *         )
     *     )
     * )
     */
    public function getMyExpenses(string $email): JsonResponse
    {
        try {
            $expenses = $this->expenseService->getAllExpenses(
                [
                    ['email', '=', $email]
                ]
            );
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }

        return response()->json([
            'message' => 'Expenses retrieved successfully.',
            'data' => $expenses
        ], 200);
    }

}
