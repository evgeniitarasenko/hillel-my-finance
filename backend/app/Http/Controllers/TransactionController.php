<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(): JsonResponse
    {
        $monthId = request()->input('month_id');

        if ($monthId) {
            $currentDate = Carbon::createFromFormat('Ym', $monthId);
        } else {
            $currentDate = Carbon::now();
        }

        $dateFrom = $currentDate->format('Y-m-01 00:00:00');
        $dateTo = $currentDate->addMonth()->format('Y-m-01 00:00:00');

        $transactions = Transaction::query()
            ->where('user_id', Auth::id())
            ->whereBetween('spent_at', [$dateFrom, $dateTo])
            ->orderBy('spent_at', 'desc')
            ->get();

        return response()->json($transactions);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->only('amount', 'description', 'category_id', 'type');

        Validator::make($data, [
            'amount' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:incomes,expenses'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ])->validate();

        $data['user_id'] = Auth::id();
        $data['spent_at'] = Carbon::now()->format('Y-m-d H:i:s');

        $transaction = Transaction::create($data);


        return response()->json($transaction);
    }

    public function update(Request $request, Transaction $transaction): JsonResponse
    {
        $data = $request->only('amount', 'description', 'type', 'category_id');

        Validator::make($data, [
            'amount' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:incomes,expenses'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ])->validate();

        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $data['user_id'] = Auth::id();

        $transaction->update($data);

        return response()->json($transaction);
    }

    public function destroy(Request $request, Transaction $transaction): JsonResponse
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $transaction->delete();

        return response()->json([]);
    }
}
