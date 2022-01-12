<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Helpers\AgentHelper;

class AgentController extends Controller
{
    public function getTopAgents()
    {
       return app()->make(AgentHelper::class)->getTopAgents();
    }
}
