<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_id' => 'required|integer',
            'color'   => 'required|string',
        ]);

        Ticket::updateOrInsert(
            ['card_id' => $validated['card_id'], 'color' => $validated['color']],
            ['created_at' => now(), 'updated_at' => now()]
        );

        return response()->json([
            'status'  => 'added',
            'card_id' => $validated['card_id'],
            'color'   => $validated['color'],
        ]);
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'card_id' => 'required|integer',
            'color'   => 'required|string',
        ]);

        Ticket::where('card_id', $validated['card_id'])
            ->where('color', $validated['color'])
            ->delete();

        return response()->json([
            'status'  => 'deleted',
            'card_id' => $validated['card_id'],
            'color'   => $validated['color'],
        ]);
    }
}