<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $reservations = auth()->user()
        ->reservations()
        ->with('chargingStation')
        ->get()
        ->map(function ($r) {
            return [
                'id'     => $r->id,
                'borne'  => $r->chargingStation->name,
                'date'   => $r->date,
                'heure'  => $r->heure,
                'status' => $r->status,
            ];
        });

    return response()->json($reservations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $reservation = Reservation::create([
            'user_id' => auth()->id(),  
            'charging_station_id' => $request->charging_station_id,
            'date' => $request->date,
            'heure' => $request->heure,
            'status' => 'pending',    
        ]);

        return response()->json($reservation, 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function pay($id)
{
    $reservation = Reservation::find($id);

    
    if (!$reservation) {
        return response()->json([
            'message' => 'Réservation introuvable'
        ], 404);
    }

    
    if ($reservation->user_id !== auth()->id()) {
        return response()->json([
            'message' => 'Non autorisé'
        ], 403);
    }

    
    if ($reservation->status !== 'pending') {
        return response()->json([
            'message' => 'Cette réservation ne peut pas être payée'
        ], 400);
    }

    
    $reservation->update(['status' => 'confirmed']);

    return response()->json([
        'message'     => 'Paiement effectué avec succès',
        'reservation' => $reservation
    ]);
}
    /**
     * Remove the specified resource from storage.
     */
    public function cancel($id)
{
    $reservation = Reservation::find($id);

    
    if (!$reservation) {
        return response()->json([
            'message' => 'Réservation introuvable'
        ], 404);
    }

    
    if ($reservation->user_id !== auth()->id()) {
        return response()->json([
            'message' => 'Non autorisé'
        ], 403);
    }

    
    if ($reservation->status === 'payee') {
        return response()->json([
            'message' => 'Impossible d\'annuler une réservation payée'
        ], 400);
    }

    
    if ($reservation->status === 'cancelled') {
        return response()->json([
            'message' => 'Réservation déjà annulée'
        ], 400);
    }

    
    $reservation->update(['status' => 'cancelled']);

    return response()->json([
        'message'     => 'Réservation annulée avec succès',
        'reservation' => $reservation
    ]);
}
}
