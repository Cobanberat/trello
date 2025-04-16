<?php

namespace App\Http\Controllers;
use App\Models\pano;
use App\Models\lists;
use App\Models\card;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class panoController extends Controller
{
    public function panoEkle(request $request)
    {

        $request->validate([
            'name' => ['required'],
        ]);
        $pano = pano::create([
            'name' => $request->name,
            'user_id' => auth::id()
        ]);

        $id = $pano->id;

        return redirect()->route('boards', $id)->with(['id' => $id]);
    }
    public function ListAdd(request $request)
    {
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
            'lists_id' => 'required|integer'
        ]);

        $cards = card::where('lists_id', $request->lists_id)->get();

        return response()->json($cards);
    }
    public function cardAdd(request $request)
    {
        $request->validate([
            "name" => ['required'],
            "lists_id" => ['required'],

        ]);
        $card = card::create([
            'name' => $request->name,
            'lists_id' => $request->lists_id
        ]);
        return $card;
    }

    public function listPano($id)
    {
        $liste = lists::where('pano_id', $id)->orderBy('id', 'asc')->get();
        $pano = pano::where('user_id', Auth::id())->orderBy('id', direction: 'asc')->get();
        $panoName = pano::where('user_id', Auth::id())->first();

        return view('layouts.app', [
            'sidebar' => view('sidebar', compact('liste', 'pano', 'panoName')),
            'container' => view('container', compact('liste', 'pano', 'panoName')),
        ]);
    }
    public function dashboard()
    {
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        return view('dashboard', [
            'main-container' => view('main-container', compact('pano')),
            'main-sidebar' => view('main-sidebar', compact('pano')),
        ]);
    }
    public function home()
    {
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        return view('home', [
            'home' => view('home', compact('pano')),
            'main-sidebar' => view('main-sidebar', compact('pano')),
        ]);
    }
    public function updateList(Request $request)
    {
        $card = Card::find($request->card_id);

        $card->lists_id = $request->new_list_id;
        $card->save();

        return response()->json(['message' => 'Kart başarıyla güncellendi.']);
    }
    public function cardUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:cards,id',
            'name' => 'required|string|max:255',
        ]);

        $card = Card::findOrFail($request->id);
        $card->name = $request->name;
        $card->save();

        return response()->json($card);
    }
    public function listUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:lists,id',
            'name' => 'required|string|max:255',
        ]);

        $list = lists::findOrFail($request->id);
        $list->name = $request->name;
        $list->save();

        return response()->json($list);
    }
    public function cardDelete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:cards,id',
        ]);

        $card = Card::findOrFail($request->id);
        $card->delete();

        return response()->json(['success' => true]);
    }
    public function updatePanoName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pano_id' => 'required|exists:panos,id',
        ]);

        $pano = pano::find($request->pano_id);
        $pano->name = $request->name;
        $pano->save();

        return response()->json(['success' => true]);
    }
    public function destroy($id)
    {
        $pano = pano::findOrFail($id);
    
        $listeler = $pano->lists;
    
        foreach ($listeler as $liste) {
            $liste->cards()->delete(); 
        }
    
        $pano->lists()->delete(); 
    
        $pano->delete();
    
        return redirect('/dashboard')->with('success', 'Pano ve içeriği başarıyla silindi.');
    }
    public function deleleList($id)
{
    $list = lists::findOrFail($id);

    $list->cards()->delete();

    $list->delete();

    return response()->json(['success' => true, 'message' => 'Liste ve kartları silindi.']);
}

}
