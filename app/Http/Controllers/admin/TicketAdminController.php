<?php

namespace App\Http\Controllers\admin;

use App\Models\Notification;
use App\Repositories\TicketRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProfileController;
use App\Models\User;
use App\Http\Controllers\Mail\TicketEmailMailable;
use Illuminate\Support\Facades\Mail;

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
        $tickets = $this->ticketRepo->adminGetAllTickets();
        $data = [
            'title' => 'Support',
            'tickets' => $tickets,
        ];
        return view('admin.supportAdmin.support', $data);
    }

    public function ticket($tab)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tickets = $this->ticketRepo->getAllTickets($userId);
        $data = [
            'title' => 'Support',
            'tickets' => $tickets,
        ];
        switch ($tab) {
            case 'ticket':
                return view('dashboard.supportAdmin.ticket', $data);
            case 'newticket':
                return view('dashboard.supportAdmin.newticket', $tickets);
            case 'apiDocuments':
                return view('dashboard.supportAdmin.apiDocuments');
            default:
                return view('dashboard.supportAdmin.knowledge');
        }
    }
    //create ticket
    public function create()
    {
        $data = [
            'title' => 'supportAdmin',
        ];
        return view('dashboard.supportAdmin.newticket', $data);
    }
    //store ticket
    private function isVietnamese($string) {
        // Biểu thức chính quy để kiểm tra các ký tự tiếng Việt
        $vietnamesePattern = '/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]/u';

        // Kiểm tra nếu có ít nhất một ký tự tiếng Việt
        if (preg_match($vietnamesePattern, $string)) {
            return true;
        }

        return false;
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ticketID' => 'required|integer',
            'message' => 'required|string',
            'file' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
        ]);
        if ($this->isVietnamese($validated['message'])) {
            return redirect()->back()->withErrors(['message' => 'The message must contain non-Vietnamese characters.']);
        }
        // Tìm ticket cần cập nhật
        $ticket = $this->ticketRepo->find($validated['ticketID']);
        $url_file = '0';
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('fileTicket', $filename, 'public');
            $url_file = 'https://streamsilk.com/storage/fileTicket/'.$filename;
        }
        // Giả sử $newMessage là tin nhắn mới bạn muốn thêm vào
        $newMessage = [
            'type' => 1,
            'message' => $validated['message'],
            'url_file' => $url_file,
            'date' => Carbon::now(),
        ];

        // Giải mã tin nhắn hiện tại từ JSON thành mảng
        $currentMessages = json_decode($ticket->message, true);

        // Thêm tin nhắn mới vào cuối mảng
        $currentMessages[] = $newMessage;

        // Mã hóa lại mảng tin nhắn thành JSON
        $updatedMessages = json_encode($currentMessages);

        // Cập nhật cột message
        $ticket->message = $updatedMessages;
        $ticket->status = 'replied';
        $ticket->save();
        // create notification
        $this->notificationTicket($ticket);
        return redirect()->back();
    }
    private function notificationTicket($ticket){
        $subject = 'Your ticket : #'.$ticket->id.' has been replied.';
        $message = 'Ticket with subject: "' . $ticket->subject . '" has been replied '. "<br>"
            . 'View Ticket: <a href="https://streamsilk.com/support/'.$ticket->id.'" class="hover:text-[#009FB2]">https://streamsilk.com/support/' . $ticket->id.'</a>';
        Notification::create([
            'user_id' => $ticket->user_id,
            'subject' => $subject,
            'message' => $message,
            'type' => 'feedback',
            'status' => 0
        ]);
        $ticketMessages = json_decode($ticket->message, true);
        $lastMessage = end($ticketMessages)['message'];
        $ticketData = [
            'ticket_id' => $ticket->id,
            'subject' => $ticket->subject,
            'message' => $lastMessage,
        ];
        Mail::to($ticket->email)->send(new TicketEmailMailable($ticketData));
    }
    //show ticket
    public function show($ticketID,Request $request)
    {
        $userId = $request->user_id;
        $ticket = $this->ticketRepo->getTicket($ticketID, $userId);
        $data = [
            'title' => 'Support',
            'tickets' => $ticket,
            'userId' => $userId,
            'userName'=> User::find($userId)->name,
            'email' => User::find($userId)->email,
        ];
        return view('admin.supportAdmin.infoCase', $data);
    }
    // complete ticket
    public function completeTicket($ticketID)
    {
        $ticket = $this->ticketRepo->find($ticketID);
        $ticket->status = 'completed';
        $ticket->save();
        return redirect()->back();
    }
}
