<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberModel;

class MemberController extends Controller
{
    /**
     * Display a listing of members.
     */
    public function index()
    {
        // Fetch all members from the database
        $members = MemberModel::all();

        // Pass the members to the view
        return view('member.index', compact('members'))->with('currentPage', 'member');
    }

        /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        return view('member.create')->with('currentPage', 'member');
    }

    /**
     * Store a newly created member in the database.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'member_firstname' => 'required|string|max:255',
            'member_lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:member,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:15',
        ]);

        // Create the new member
        MemberModel::create([
            'member_firstname' => $request->member_firstname,
            'member_lastname' => $request->member_lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt the password
            'phone' => $request->phone,
        ]);

        return redirect()->route('member.index')->with('success', 'สมาชิกใหม่ถูกสร้างเรียบร้อยแล้ว')->with('currentPage', 'member');
    }

        /**
     * Show the form for editing the specified member.
     */
    public function edit($id)
    {
        // Retrieve the member by their ID
        $member = MemberModel::findOrFail($id);

        // Pass the member data to the edit view
        return view('member.edit', compact('member'))->with('currentPage', 'member');
    }

    /**
     * Update the specified member in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the form input
        $request->validate([
            'member_firstname' => 'required|string|max:255',
            'member_lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:member,email,' . $id . ',member_id', // Ignore unique check for the current member
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string|max:15',
        ]);

        // Retrieve the member
        $member = MemberModel::findOrFail($id);

        // Update member details
        $member->member_firstname = $request->member_firstname;
        $member->member_lastname = $request->member_lastname;
        $member->email = $request->email;

        // Only update password if provided
        if ($request->filled('password')) {
            $member->password = bcrypt($request->password);
        }

        $member->phone = $request->phone;
        $member->save();

        return redirect()->route('member.index')->with('success', 'ข้อมูลสมาชิกถูกอัปเดตเรียบร้อยแล้ว')->with('currentPage', 'member');
    }
    public function destroy($id)
    {
        $member = MemberModel::findOrFail($id);  // ค้นหาสมาชิกที่ต้องการลบ
        $member->delete();  // ลบสมาชิกที่ค้นพบ
        
        // Redirect กลับไปยังหน้าที่ต้องการพร้อมข้อความแจ้งเตือน
        return redirect()->route('member.index')->with('success', 'สมาชิกถูกลบเรียบร้อยแล้ว');
    }
}