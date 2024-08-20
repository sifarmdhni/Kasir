<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('payment-images', 'public');
        }

        Payment::create($validated);
        return redirect()->route('payments.index')->with('success', 'Metode Pembayaran berhasil ditambahkan');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($payment->gambar) {
                Storage::disk('public')->delete($payment->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('payment-images', 'public');
        }

        $payment->update($validated);
        return redirect()->route('payments.index')->with('success', 'Metode Pembayaran berhasil diperbarui');
    }

    public function destroy(Payment $payment)
    {
        if ($payment->gambar) {
            Storage::disk('public')->delete($payment->gambar);
        }
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Metode Pembayaran berhasil dihapus');
    }
}