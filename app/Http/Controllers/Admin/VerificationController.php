<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $objs = Verification::orderBy('id', 'desc')
            ->paginate();

        return view('admin.verification.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
