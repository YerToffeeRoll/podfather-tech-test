<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $data = Waste::query()
            ->when($search, function ($query, $search) {
                return $query->where('customer_name', 'LIKE', "%{$search}%")
                             ->orWhere('site', 'LIKE', "%{$search}%")
                             ->orWhere('waste_type', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('customer.waste.index', compact('data', 'search'));
    }
}
