<?php

namespace App\Http\Controllers\admin;

use App\Models\Ticket;
use App\Repositories\TicketRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProfileController;

class TicketAdminController
{
    protected $ticketRepo, $profileController;

    public function __construct(TicketRepo $ticketRepo, ProfileController $profileController)
    {
        $this->ticketRepo = $ticketRepo;
        $this->profileController = $profileController;
    }
    public function index()
    {
        $tickets = $this->ticketRepo->all();
        $data = [
            'title' => 'Support',
            'tickets' => $tickets,
        ];
        return view('admin.support.support', $data);
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
        $userID = $request->user_id;
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
            'type' => 1,
            'message' => $message,
            'url_file' => $url_file,
        ];

        $dataMessage = json_encode($dataMessage);
        //create ticket
        $dataTicke = [
            'user_id' => $userID,
            'subject' => $subject,
            'topic' => $topic,
            'status' => 'pendding',
            'message' => $dataMessage,
            'url_file' => $url_file,
        ];
        Ticket::create($dataTicke);
        return redirect('https://streamsilk.com/admin/support?tab=cases');
    }
    //show ticket
    public function show($subject,Request $request)
    {
        $userId = $request->user_id;
        $ticket = $this->ticketRepo->getTicket($subject, $userId);
        $data = [
            'title' => 'Support',
            'ticket' => $ticket,
            'user_id' => $userId,
        ];
        return view('admin.support.infoCase', $data);
    }
    public function postTickket(Request $request)
    {
        $userID = $request->user_id;
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
        ];

        $dataMessage = json_encode($dataMessage);
        //create ticket
        $dataTicke = [
            'user_id' => $userID,
            'subject' => $subject,
            'topic' => $topic,
            'status' => 'pendding',
            'message' => $dataMessage,
            'url_file' => $url_file,
        ];
        Ticket::create($dataTicke);
        return redirect('https://streamsilk.com/admin/support?tab=cases');
    }
}
