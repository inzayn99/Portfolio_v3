<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

class InquiryController extends Controller
{
    public function index()
    {
        $fullinquiry = Inquiry::first()->paginate(200);
        Inquiry::where('is_read',0)->update(['is_read'=>1]);

        return view('backend.online-booking.full-inquiry-list', compact('fullinquiry'));
    }


    public function show(string $id)
    {
         // dd($id);
         $fullinquiry = Inquiry::findOrFail($id);
         return view('backend.online-booking.full-inquiry-show',compact('fullinquiry'));
    }


    public function destroy(string $id)
    {
        $fullinquiry = Inquiry::findOrFail($id);
        $fullinquiry->delete();
        return response()->json(['success' => true, 'message' => 'Inquiry deleted successfully.']);
    }

    // ---------------------------------------------------QuickInquiry---------------------------------


    public function quickindex()
    {
        $quickinquiry = QuickInquiry::first()->paginate(200);
        return view('backend.online-booking.quick-inquiry-list', compact('quickinquiry'));
    }


    // public function quickshow(string $id)
    // {
    //      // dd($id);
    //      $quickinquiry = QuickInquiry::findOrFail($id);
    //      return view('backend.online-booking.quick-inquiry-show',compact('quickinquiry'));
    // }


    public function quickdestroy(string $id)
    {
        $quickinquiry = QuickInquiry::findOrFail($id);
        $quickinquiry->delete();
        return response()->json(['success' => true, 'message' => 'Inquiry deleted successfully.']);
    }
}
