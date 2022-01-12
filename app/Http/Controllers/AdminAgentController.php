<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\AddLink;
use App\Models\Agent;
use App\Models\Property;

class AdminAgentController extends Controller
{
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

