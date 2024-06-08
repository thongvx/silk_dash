<?php

namespace App\Http\Controllers\Support;

use Illuminate\Http\Request;
use App\Repositories\TicketRepo;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
class TicketController
{
    protected $ticketRepo;

    public function __construct(TicketRepo $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $tickets = $this->ticketRepo->getAllTickets($userId);
        $data = [
            'title' => 'support',
            'tickets' => $tickets
        ];
        return view('support.support', $data);
    }

    public function ticket($tab)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tickets = $this->ticketRepo->getAllTickets($userId);
        $data = [
            'title' => 'support',
            'tickets' => $tickets
        ];
        switch ($tab) {
            case 'ticket':
                return view('support.ticket', $data);
            case 'newticket':
                return view('support.newticket', $tickets);
            case 'apiDocuments':
                return view('support.apiDocuments');
            default:
                return view('support.knowledge');
        }
    }
    //create ticket
    public function create()
    {
        $data = [
            'title' => 'support',
        ];
        return view('support.newticket', $data);
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
