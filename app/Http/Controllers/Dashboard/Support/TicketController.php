<?php

namespace App\Http\Controllers\Dashboard\Support;

use App\Models\Ticket;
use App\Repositories\TicketRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProfileController;

class TicketController
{
    protected $ticketRepo, $profileController;

    public function __construct(TicketRepo $ticketRepo, ProfileController $profileController)
    {
        $this->ticketRepo = $ticketRepo;
        $this->profileController = $profileController;
    }
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $tickets = $this->ticketRepo->getAllTickets($userId);
        $data = [
            'title' => 'Support',
            'tickets' => $tickets,
        ];
        return view('dashboard.support.support', $data);
    }

    public function ticket($tab)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tickets = $this->ticketRepo->getAllTickets($userId);
        $data = [
            'title' => 'Support',
            'tickets' => $tickets
        ];
        switch ($tab) {
            case 'ticket':
                return view('dashboard.support.ticket', $data);
            case 'newticket':
                return view('dashboard.support.newticket', $tickets);
            case 'apiDocuments':
                return view('dashboard.support.apiDocuments');
            default:
                return view('dashboard.support.knowledge');
        }
    }
    //create ticket
    public function create()
    {
        $data = [
            'title' => 'support',
        ];
        return view('dashboard.support.newticket', $data);
    }
    //store ticket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'topic' => 'required|string',
            'subject' => 'required|string',
        ]);

        $ticket = new Ticket;
        $ticket->user_id = Auth::user()->id;
        $ticket->email = $validated['email'];
        $ticket->topic = $validated['topic'];
        $ticket->subject = $validated['subject'];

        $ticket->save();

        return response()->json(['message' => 'Ticket created successfully']);
    }

}
