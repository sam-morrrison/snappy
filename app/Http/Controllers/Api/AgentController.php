<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Helpers\AgentHelper;

class AgentController extends Controller
{
    /**
     * Get agents with at least two properties in common with
     * at least two other agents
     *
     * @return array
     */
    public function getTopAgents()
    {
       return app()->make(AgentHelper::class)->getTopAgents();
    }
}
