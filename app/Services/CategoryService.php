<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * List All Category
     */
    public function getAllCategory(): object
    {
        $conditions = [['userId', '=', Auth::user()->id]];

        return $this->categoryRepository->fetchAll([], $conditions);
    }

    /**
     * Store Category
     */
    public function storeCategory(array $data): void
    {
        $this->categoryRepository->store($data);
    }

    
    /**
     * Store Category
     */
    public function getCategoryById(int $id): object
    {
        return $this->categoryRepository->fetch($id);
    }

    /**
     * Store Category
     */
    public function updateCategory(int $id, array $data): void
    {
        $this->categoryRepository->update(
            $data,
            $id
        );
    }

    /**
     * Delete Category
     */
    public function deleteCategory(int $id)
    {
        $this->categoryRepository->delete(
            $id
        );
    }
}