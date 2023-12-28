<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::query()->where('user_id', Auth::id())
            ->orderBy('type')->get();

        return response()->json($categories);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->only('title', 'icon', 'type');

        Validator::make($data, [
            'title' => ['required', 'string', 'max:50', Rule::unique('categories', 'title')->where(fn ($query) => $query->where('user_id', Auth::id()))],
            'icon' => ['nullable', 'string', 'max:20'],
            'type' => ['required', 'string', 'in:incomes,expenses'],
        ])->validate();

        $data['user_id'] = Auth::id();

        $category = Category::create($data);


        return response()->json($category);
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        $data = $request->only('title', 'icon', 'type');

        Validator::make($data, [
            'title' => ['required', 'string', 'max:50', Rule::unique('categories', 'title')->where(fn ($query) => $query->where('user_id', Auth::id()))->ignore($category->id)],
            'icon' => ['nullable', 'string', 'max:20'],
            'type' => ['required', 'string', 'in:incomes,expenses'],
        ])->validate();

        if ($category->user_id !== Auth::id()) {
            abort(403);
        }

        $data['user_id'] = Auth::id();

        $category->update($data);

        return response()->json($category);
    }

    public function destroy(Request $request, Category $category): JsonResponse
    {
        if ($category->user_id !== Auth::id()) {
            abort(403);
        }

        $category->delete();

        return response()->json([]);
    }
}
