<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;

class BusinessTypeController extends Controller
{
    public function index()
    {
        return response()->json([BusinessType::all()],200);
    }
}
