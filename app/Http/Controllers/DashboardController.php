<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Helpers\AgentHelper;
use App\Models\Property;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Paginator
     */
    public function index()
    {
        $properties = Property::with('agents')->get();
        return view('dashboard', compact('properties'));
    }

    /**
     * Display a resource.
     *
     * @param Property $property
     * @return  * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $agents =  AgentHelper::getAvailableAgents($property);
        return view('agent-link', compact('agents','property'));
    }

}
