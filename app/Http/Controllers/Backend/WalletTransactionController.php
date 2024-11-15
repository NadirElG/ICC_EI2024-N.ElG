<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\WalletTransactionDataTable;
use App\Http\Controllers\Controller;
use App\Mail\RefundNotification;
use App\Models\User;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WalletTransactionController extends Controller
{
    public function index(WalletTransactionDataTable $dataTable)
    {
        return $dataTable->render('admin.wallet_transactions.index');
    }

    public function showRefundForm()
    {
        return view('admin.wallet_transactions.refund');
    }

    public function refund(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $user = User::find($validated['user_id']);
        $wallet = $user->wallet;

        // Ajouter le remboursement
        $wallet->balance += $validated['amount'];
        $wallet->save();

        // Créer une transaction
        WalletTransaction::create([
            'wallet_id' => $wallet->id,
            'user_id' => $user->id,
            'type' => 'refund',
            'amount' => $validated['amount'],
            'description' => 'Remboursement effectué par admin',
        ]);

        // Envoyer un email à l'utilisateur
        Mail::to($user->email)->send(new RefundNotification($user, $validated['amount']));

        return redirect()->back()->with('success', 'Remboursement effectué avec succès.');
    }



}
