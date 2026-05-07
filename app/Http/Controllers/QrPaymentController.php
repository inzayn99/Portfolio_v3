<?php

namespace App\Http\Controllers;

use App\Models\QrPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QrPaymentController extends Controller
{
    public function index()
    {
        $payment = QrPayment::latest()->paginate(100);
        return view('backend.payment.index', compact('payment'));
    }

    public function create()
    {
        return view('backend.payment.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image'       => 'nullable|string|max:250',
            'name'        => 'required',
            'description' => 'nullable',
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['publish_status']= $request->publish_status??0;
        QrPayment::create($input);
        return redirect()->route('payment.index')->with('success', 'Qr-Payment is Saved successfully.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $payment = QrPayment::findOrFail($id);
        return view('backend.payment.create', compact('payment'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image'    => 'nullable|string|max:250',
            'name'        => 'required',
            'description'  => 'nullable',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['publish_status']= $request->publish_status??0;
        QrPayment::findOrFail($id)->update($input);
        return redirect()->route('payment.index')->with('success', 'Qr-Payment updated successfully.');
    }

    public function destroy(string $id)
    {
        $payment = QrPayment::findOrFail($id);
        $payment->delete();
        return response()->json(['success' => true, 'message' => 'Qr-Payment Data deleted successfully.']);
    }
}
