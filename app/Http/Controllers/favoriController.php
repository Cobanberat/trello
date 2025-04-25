<?php
 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\favories;

class favoriController extends Controller
{
    public function ekle(Request $request)
    {
        favories::create([
            'user_id' => auth()->id(),
            'pano_id' => $request->pano_id,
        ]);
    
        return response()->json(['message' => 'Favoriye eklendi']);
    }
    
    public function sil(Request $request)
    {
        favories::where('user_id', auth()->id())
            ->where('pano_id', $request->pano_id)
            ->delete();
    
        return response()->json(['message' => 'Favoriden silindi']);
    }
    
}
