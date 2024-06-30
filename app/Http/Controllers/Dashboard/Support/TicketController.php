<?php

namespace App\Http\Controllers\Dashboard\Support;

use App\Models\Ticket;
use App\Repositories\TicketRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProfileController;
use Carbon\Carbon;
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
                return view('dashboard.support.newticket', $data);
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
            'ticketID' => 'required|email',
            'message' => 'required|string',
        ]);
        $ticket = $this->ticketRepo->find($validated['email']);
        $ticket = new Ticket;
        $ticket->user_id = Auth::user()->id;
        $ticket->email = $validated['email'];
        $ticket->topic = $validated['topic'];
        $ticket->subject = $validated['subject'];

        $ticket->save();

        return response()->json(['message' => 'Ticket created successfully']);
    }
    //show ticket
    public function show($ticketID)
    {
        $user = Auth::user();
        $userId = $user->id;
        $ticket = $this->ticketRepo->getTicket($ticketID,$userId);
        $data = [
            'title' => 'Support',
            'tickets' => $ticket,
            'userId' => $userId,
        ];
        return view('dashboard.support.infoTicket', $data);
    }
    public function postTickket(Request $request)
    {
        $user = Auth::user();
        $topic = $request->topic;
        $subject = $request->subject;
        $message = $request->message;
        $url_file = '0';
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('fileTicket', $filename, 'public');
            $url_file = 'https://streamsilk.com/storage/fileTicket/'.$filename;
        }


        $dataMessage = [
            'type' => 2,
            'message' => $message,
            'url_file' => $url_file,
            'date' => Carbon::now(),
        ];

        $dataMessage = json_encode($dataMessage);
        //create ticket
        $dataTicke = [
            'user_id' => $user->id,
            'subject' => $subject,
            'topic' => $topic,
            'status' => 'pendding',
            'message' => $dataMessage,
            'url_file' => $url_file,
        ];
        Ticket::create($dataTicke);
        return redirect('https://streamsilk.com/support?tab=ticket');
    }
}
