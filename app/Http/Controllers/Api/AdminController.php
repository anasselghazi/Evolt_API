<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;


class AdminController extends Controller
{
    
    public function dashboard()
    {
        
        $stats = [
            'total'    => Reservation::count(),
            'payee'    => Reservation::where('status', 'confirmed')->count(),
            'en_cours' => Reservation::where('status', 'pending')->count(),
            'annulee'  => Reservation::where('status', 'cancelled')->count(),
        ];

        
        $last_reservations = Reservation::with(['user', 'chargingStation'])
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($r) {
                return [
                    'id'     => $r->id,
                    'user'   => $r->user->name,
                    'borne'  => $r->chargingStation->name,
                    'date'   => $r->date,
                    'heure'  => $r->heure,
                    'status' => $r->status,
                ];
            });

        return response()->json([
            'stats'             => $stats,
            'last_reservations' => $last_reservations,
        ]);
    }
}






