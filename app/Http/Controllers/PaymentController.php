<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        return view('payment.index', compact('payment'));
    }

    public function create()
    {
        return view('payment.create');
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
        return redirect()->route('payment.index')->with('success', 'Metode Pembayaran berhasil ditambahkan');
    }

    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payment.edit', compact('payment'));
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
        return redirect()->route('payment.index')->with('success', 'Metode Pembayaran berhasil diperbarui');
    }

    public function destroy(Payment $payment)
    {
        if ($payment->gambar) {
            Storage::disk('public')->delete($payment->gambar);
        }
        $payment->delete();
        return redirect()->route('payment.index')->with('success', 'Metode Pembayaran berhasil dihapus');
    }
}