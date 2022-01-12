<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Helpers\AgentHelper;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $properties = Property::with('agents')->get();
        return view('dashboard', compact('properties'));
    }

    public function show(Property $property)
    {
        $agents =  AgentHelper::getAvailableAgents($property);
        $data = [$agents, $property];
        return view('agent-link', compact('agents','property'));
    }

}
