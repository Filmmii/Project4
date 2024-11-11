<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamModel;
use App\Models\MemberModel;

class TeamController extends Controller
{
    /**
     * Display a listing of teams.
     */
    public function index()
    {
        // Fetch all teams along with the count of members in each team
        $teams = TeamModel::withCount('members')->get();
    
        // Pass the teams data to the index view
        return view('team.index', compact('teams'))->with('currentPage', 'team');
    }

    /**
     * Show the form for creating a new team.
     */
    public function create()
    {
        $members = MemberModel::all(); // Fetch all members to add to the team
        return view('team.create', compact('members'))->with('currentPage', 'team');
    }

    /**
     * Store a newly created team in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',
            'project_id' => 'required|exists:project,project_id',
            'members' => 'array', // Members are optional and should be an array
        ]);

        $team = TeamModel::create([
            'team_name' => $request->team_name,
            'project_id' => $request->project_id,
        ]);

        // Attach selected members to the team
        if ($request->has('members')) {
            $team->members()->attach($request->members);
        }

        return redirect()->route('team.index')->with('success', 'ทีมใหม่ถูกสร้างเรียบร้อยแล้ว')->with('currentPage', 'team');
    }

    /**
     * Show the form for editing the specified team.
     */
    public function edit($id)
    {
        $team = TeamModel::with('members')->findOrFail($id);
        $membersInTeam = $team->members; // Fetch members already in the team
        $allMembers = MemberModel::all(); // Fetch all members to allow adding new ones
        $availableMembers = $allMembers->diff($membersInTeam); // Exclude current team members from the available list
    
        return view('team.edit', compact('team', 'membersInTeam', 'availableMembers'))->with('currentPage', 'team');
    }

    /**
     * Update the specified team in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',
            'project_id' => 'required|exists:project,project_id',
            'members' => 'array',
        ]);

        $team = TeamModel::findOrFail($id);
        $team->update([
            'team_name' => $request->team_name,
            'project_id' => $request->project_id,
        ]);

        // จะเพิ่มสมาชิกใหม่ในรายการโดยไม่ลบสมาชิกเก่าออก
        $team->members()->syncWithoutDetaching($request->members);

        return redirect()->route('team.index')->with('success', 'ข้อมูลทีมถูกอัปเดตเรียบร้อยแล้ว')->with('currentPage', 'team');
    }
    public function removeMember(Request $request, $teamId)
    {
        $team = TeamModel::findOrFail($teamId);
        $memberId = $request->input('member_id');
    
        // ลบสมาชิกออกจากทีม
        $team->members()->detach($memberId);
    
        return redirect()->route('team.edit', $teamId)
                         ->with('success', 'สมาชิกถูกลบออกจากทีมเรียบร้อยแล้ว')
                         ->with('currentPage', 'team');
    }
    



    public function destroy(string $project_id)
{
    TeamModel::find($project_id)->delete();
    return redirect('team');
    
}
}