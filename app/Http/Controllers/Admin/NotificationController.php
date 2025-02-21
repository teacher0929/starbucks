<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'customer' => ['nullable', 'integer', 'min:1'],
        ]);
        $f_customer = $request->has('customer') ? $request->customer : null;

        $objs = Notification::when(isset($f_customer), fn($query) => $query->where('customer_id', $f_customer))
            ->with('customer')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.notification.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
