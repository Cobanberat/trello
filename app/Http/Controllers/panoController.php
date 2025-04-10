<?php

namespace App\Http\Controllers;
use App\Models\pano;
use App\Models\lists;
use App\Models\card;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class panoController extends Controller
{
    public function panoEkle(request $request){

        $request->validate([
            'name'=> ['required'],
        ]);
        $pano = pano::create([
            'name'=>$request->name,
            'user_id'=> auth::id()
        ]);

        $id = $pano->id;

        return redirect()->route('boards', $id)->with(['id' => $id] );
    }
    public function ListAdd(request $request){
        $request->validate([
            "name" => ['required'],
            "pano_id" => ['required'],
            
        ]);
        $pano = lists::create([
            'name' => $request->name,
            'pano_id' => $request->pano_id
        ]);
        return $pano;
    }
    
    public function getCards(Request $request)
{
    $request->validate([
        'list_id' => 'required|integer'
    ]);

    $cards = card::where('list_id', $request->list_id)->get();

    return response()->json($cards);
}
    public function cardAdd(request $request){
        $request->validate([
            "name" => ['required'],
            "list_id" => ['required'],
            
        ]);
        $card = card::create([
            'name' => $request->name,
            'list_id' => $request->list_id
        ]);
        return $card;
    }

    public function listPano($id){
        $liste = lists::where('pano_id', $id)->orderBy('id', 'asc')->get();
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();

        return view('layouts.app', [
            'sidebar' => view('sidebar', compact('liste','pano')),
            'container' => view('container', compact('liste','pano')),
        ]);
    }
    public function dashboard(){
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        return view('dashboard', [
            'main-container' => view('main-container', compact('pano')),
            'main-sidebar' => view('main-sidebar', compact('pano')),
        ]);
    }
    public function updateList(Request $request)
    {
        $card = Card::find($request->card_id);
    
        $card->list_id = $request->new_list_id;
        $card->save();
    
        return response()->json(['message' => 'Kart başarıyla güncellendi.']);
    }


}
