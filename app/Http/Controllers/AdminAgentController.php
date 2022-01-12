<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\AddLink;
use App\Http\Requests\StoreAgent;
use App\Models\Agent;
use App\Models\Property;

class AdminAgentController extends Controller
{
    public function create()
    {
        return view('agent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAgent $request
     * @return Agent
     */
    public function store(StoreAgent $request)
    {
        Agent::create($request->validated());

        return redirect('/properties');
    }

    /**
     * Create a link between an agent and a property
     *
     * @param AddLink $request
     */
    public function link(AddLink $request)
    {
        $agent = Agent::find($request->get('agent_id'));
        $property = Property::find($request->get('property_id'));

        $property->agents()->attach($agent, [
            'property_id' => $property->id,
            'role' => $request->get('role'),
        ]);

        return redirect("/properties");
    }
}

