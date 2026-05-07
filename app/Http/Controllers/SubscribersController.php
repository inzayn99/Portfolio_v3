<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{

    public function index()
    {
        // $unread_subscribers = Subscribers::where('is_read', 0)->get();
        // foreach ($unread_subscribers as $unread) {
        //     $unread->update(['is_read' => 1]);
        // }
        Subscribers::where('is_read', 0)->update(['is_read'=>1]);

        $subscribers = Subscribers::latest()->paginate(100);
        return view('backend.contact_mails.subscribers', compact('subscribers'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $existing_subscriber = Subscribers::where('email', $request['email'])->first();
        // if ($existing_subscriber) {
        //     return redirect()->route('index')->with('success', 'You have already subscribed.');
        // }
        // $new_subscriber = Subscribers::create([
        //     'email' => $request['email'],
        //     'is_read' => 0
        // ]);

        // $data['email'] = $request['email'];
        // Mail::send('emails.subscriberMail', $data, function($message)use($data)
        // {
        //     $message->to($data["email"])->subject("Subscribed Confirmation");
        // });

        // $new_subscriber->save();
        // return redirect()->route('index')->with('success', 'Thank you for your subscription. We will get back to you soon.');
    }


    public function show($id)
    {

    }


    public function edit(Subscribers $subscribers)
    {
        //
    }

    public function update(Request $request, Subscribers $subscribers)
    {
        //
    }

    public function destroy($id)
    {
        Subscribers::find($id)->delete();
        // return redirect()->back()->with('success','Subscriber has been deleted');
        return response()->json(['success' => true, 'message' => 'Subscriber deleted successfully.']);

    }


}
