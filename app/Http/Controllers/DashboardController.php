<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        $properties = Property::all();
//        dd($properties);
        return view('dashboard', [
            'properties' => Property::all()
        ]);
    }

}
