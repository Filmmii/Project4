<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageModel;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of messages for the authenticated user.
     */
    public function index()
    {
        $userId = Auth::id(); // Get the authenticated member's ID

        // Retrieve messages where the authenticated user is either the sender or receiver
        $messages = MessageModel::where('sender_id', $userId)
                     ->orWhere('receiver_id', $userId)
                     ->orderBy('timestamp', 'desc')
                     ->get();

        return view('message.index', compact('messages'))->with('currentPage', 'message');
    }
}