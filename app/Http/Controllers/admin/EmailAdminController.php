<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailAdminController extends Controller
{
    public function index(Request $request)
    {
        // Fetch available emails from the database or define them here
        $data = $this->emailController($request);

        return view('admin.mail.index', $data);
    }
    public function emailController(Request $request)
    {
        $data['title'] = 'Emails';
        $data['emails'] = [
            ['id' => 1, 'subject' => 'Welcome Email', 'body' => 'Welcome to our platform!'],
            ['id' => 2, 'subject' => 'Discount Offer', 'body' => 'Get 30% off on your next purchase!'],
            // Add more emails as needed
        ];
        return $data;
    }
}
