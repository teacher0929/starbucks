<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'invited' => ['nullable', 'integer', 'min:1'],
        ]);
        $f_invited = $request->has('invited') ? $request->invited : null;

        $objs = Customer::when(isset($f_invited), fn($query) => $query->where('invited_id', $f_invited))
            ->with('invited')
            ->withCount('invites', 'orders', 'reviews', 'notifications', 'gifts')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.customer.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
