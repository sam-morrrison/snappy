<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function getTopAgents()
    {
        $agent = new Agent;

        //Get all agents
        $agents = $agent->all();

        $topAgents = [];

        foreach ($agents as $agent) {
            $totalAgentMatches = 0;
            //get all the other agents
            $otherAgents = $agent->all()->except(['id', $agent->id]);

            //Now get properties for our agent
            $properties = $agent->properties()->pluck('property_id')->toArray();

            //Then loop through other agents and compare to our guy
            foreach ($otherAgents as $otherAgent) {
                //Get the properties for this agent
                $otherAgentProperties = $otherAgent->properties()->pluck('property_id');
                $matchingProperties = 0;
                foreach ($otherAgentProperties as $otherAgentProperty) {
                    //for each one that matches one of our agent's - increment the count of matches
                    if (in_array($otherAgentProperty, $properties)) {
                        $matchingProperties ++;
                    }

                    //If we've matched two, we can increment the total matches for our agent
                    //and ignore any more for this agent
                    if ($matchingProperties >= 2) {
                        $totalAgentMatches ++;
                        continue;
                    }
                }
            }

            //If we've matched with at least twoother agents, add our agent to top agents array

            if ($totalAgentMatches >= 2) {
                $topAgents[] = [
                    'agent_id' => $agent->id,
                    'first_name' => $agent->first_name,
                    'last_name' => $agent->last_name
                ];
            }
        }

       return $topAgents;

    }
}
