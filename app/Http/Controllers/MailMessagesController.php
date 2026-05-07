<?php

namespace App\Http\Controllers;

use App\Models\MailMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailMessagesController extends Controller
{
    public function index()
    {
        $messages = MailMessages::latest()->paginate(1000);
        MailMessages::where('is_read',0)->update(['is_read'=>1]);
        return view('backend.contact_mails.index', compact('messages'));
    }



    public function show($id)
    {
        $mail = MailMessages::findOrFail($id);
        return view('backend.contact_mails.show', compact('mail'));
    }



    public function destroy($id)
    {
        MailMessages::findOrFail($id)->delete();
        // return redirect()->back()->with('success','Mail info has been deleted');
        return response()->json(['success' => true, 'message' => 'Mail deleted successfully.']);

    }


}
