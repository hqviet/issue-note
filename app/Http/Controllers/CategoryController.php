<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\ControllerTrait;
class CategoryController extends Controller
{
    use ControllerTrait;

    public function __construct()
    {
        $this->model = new Category;
    }

    public function getAll(Request $request)
    {
        try {
            $categories = Category::all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $categories = [];
        }
        return $this->responseWithMessage($categories, $request);
    }
}
