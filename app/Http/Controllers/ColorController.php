<?php
namespace App\Http\Controllers;

use App\Models\backgrounds;
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
    public function imgAdd(Request $request)
    {
        $backgrounds = backgrounds::where('card_id', $request->card_id)->whereNull('img')->first();
        if ($backgrounds) {
            $backgrounds->delete();
        }
        $backgrounds2 = backgrounds::where('card_id', $request->card_id)->where('durum', 1)->first();
        if ($backgrounds2) {
            $backgrounds2->durum = 0;
            $backgrounds2->save();
        }
         $backgroundColor = Backgrounds::where('card_id', $request->card_id)
                ->whereNull('img')
                ->first();
            if ($backgroundColor) {
                $backgroundColor->delete();
            }
            
        if ($request->hasFile('kapak')) {
            $file = $request->file('kapak');
            $path = $file->store('backgrounds', 'public');

            backgrounds::create([
                'card_id'    => $request->card_id,
                'img'        => $path,
                'type'       => 1,
                'durum'      => 1,
                'renk'       => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
           
            return response()->json([
                'status' => 'success',
                'img'    => $path,
            ]);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'No file uploaded',
            ]);
        }

    }
    public function imgUpdate(Request $request)
    {
        Backgrounds::where('card_id', $request->card_id)
            ->where('durum', 1)
            ->update(['durum' => 0]);

        $background = Backgrounds::where('id', $request->id)
            ->where('card_id', $request->card_id)
            ->first();

        if ($background) {
            $background->durum = 1;
            $background->save();

            $backgroundColor = Backgrounds::where('card_id', $request->card_id)
                ->whereNull('img')
                ->first();
            if ($backgroundColor) {
                $backgroundColor->delete();
            }

            return response()->json([
                'status' => 'success',
                'img'    => $background->img,
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Background not found',
        ]);
    }
}
