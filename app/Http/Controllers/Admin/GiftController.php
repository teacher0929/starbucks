<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'customer' => ['nullable', 'integer', 'min:1'],
        ]);
        $f_customer = $request->has('customer') ? $request->customer : null;

        $objs = Gift::when(isset($f_customer), fn($query) => $query->where('customer_id', $f_customer))
            ->with('customer')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.gift.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
