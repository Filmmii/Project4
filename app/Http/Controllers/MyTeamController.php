<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;

class MyTeamController extends Controller
{
    /**
     * Display a listing of the teams associated with the authenticated member.
     */
    public function index()
    {
        // Get the authenticated member's ID
        $memberId = Auth::id();

        // Retrieve the authenticated member's teams
        $member = MemberModel::with('teams')->find($memberId);
        $teams = $member ? $member->teams : collect();

        return view('my-team.index', compact('teams'))->with('currentPage', 'my-team');
    }
}