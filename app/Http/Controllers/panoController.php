<?php
namespace App\Http\Controllers;

use App\Models\backgrounds;
use App\Models\card;
use App\Models\favories;
use App\Models\lists;
use App\Models\pano;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class panoController extends Controller
{
    public function panoEkle(request $request)
    {

        $request->validate([
            'name' => ['required'],
        ]);
        $pano = pano::create([
            'name'    => $request->name,
            'user_id' => auth::id(),
        ]);
        $user = User::findOrFail(auth::id());
        $id = $pano->id;
        $user->last_board_id = $pano->id;
        $user->save();

        return redirect()->route('boards', $id)->with(['id' => $id]);
    }

    public function ListAdd(request $request)
    {
        $request->validate([
            'name'    => ['required'],
            'pano_id' => ['required'],

        ]);
        $pano = lists::create([
            'name'    => $request->name,
            'pano_id' => $request->pano_id,
        ]);
        return $pano;
    }

    public function getCards(Request $request)
    {
        $request->validate([
            'lists_id' => 'required|integer',
        ]);

        $cards = card::where('lists_id', $request->lists_id)->get();

        return response()->json($cards);

    }

    public function cardAdd(request $request)
    {
        $request->validate([
            'name'     => ['required'],
            'lists_id' => ['required'],

        ]);
        $card = card::create([
            'name'     => $request->name,
            'lists_id' => $request->lists_id,
        ]);

        return $card;
    }

    public function listPano($id)
    {
        $liste    = lists::where('pano_id', $id)->orderBy('id', 'asc')->get();
        $pano     = pano::with('favori')->where('user_id', Auth::id())->orderBy('id', direction: 'asc')->get();
        $panoName = pano::where('user_id', Auth::id())->find($id);

        $isFavori = favories::where('user_id', auth()->id())->where('pano_id', $id)->exists();

        return view('layouts.app', [
            'sidebar'   => view('sidebar', compact('liste', 'pano', 'panoName')),
            'container' => view('container', compact('liste', 'pano', 'panoName', 'isFavori')),
        ]);
    }

    public function dashboard()
    {
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        return view('dashboard', [
            'main-container' => view('main-container', compact('pano')),
            'main-sidebar'   => view('main-sidebar', compact('pano')),
        ]);
    }

    public function table()
    {
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        return view('layouts.app', [
            'sidebar' => view('sidebar', compact('pano')),
            'table'   => view('table', compact('pano')),
        ]);
    }

    public function home()
    {
        $pano = pano::where('user_id', Auth::id())->orderBy('id', 'asc')->get();
        return view('home', [
            'home'         => view('home', compact('pano')),
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
            'id'   => 'required|integer|exists:cards,id',
            'name' => 'required|string|max:255',
        ]);

        $card       = Card::findOrFail($request->id);
        $card->name = $request->name;
        $card->save();

        return response()->json($card);
    }

    public function listUpdate(Request $request)
    {
        $request->validate([
            'id'   => 'required|exists:lists,id',
            'name' => 'required|string|max:255',
        ]);

        $list       = lists::findOrFail($request->id);
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
        $card->backgrounds()->delete();
        $card->delete();

        return response()->json(['success' => true]);
    }

    public function updatePanoName(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'pano_id' => 'required|exists:panos,id',
        ]);

        $pano       = pano::find($request->pano_id);
        $pano->name = $request->name;
        $pano->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $pano = pano::findOrFail($id);

        $listeler = $pano->lists;

        $user = User::where('last_board_id', $pano->id)->first();
        foreach ($listeler as $liste) {
            $card = card::where('lists_id', $liste->id)->first();
            $card->backgrounds()->delete();
            $liste->cards()->delete();
        }
        $user = User::where('last_board_id', $pano->id)->first();

        if ($user) {
            $user->last_board_id = null;
            $user->save();
        }

        $pano->favories()->delete();
        $pano->lists()->delete();

        $pano->delete();

        return redirect('/dashboard')->with('success', 'Pano ve içeriği başarıyla silindi.');
    }

    public function deleleList($id)
    {

        $list = lists::findOrFail($id);

        $card = card::where('lists_id', $id)->first();
        if ($card) {
            $card->backgrounds()->delete();
            $list->cards()->delete();
        }

        $list->delete();

        return response()->json(['success' => true, 'message' => 'Liste ve kartları silindi.']);
    }

    public function profileUpdate(request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $user       = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();
        return response()->json(['success' => true, 'name' => $user->name, 'message' => 'Kaydedildi']);
    }

    public function profile()
    {

        $user     = User::where('id', Auth::id())->first();
        $fullName = $user->name;
        $words    = explode(' ', $fullName);
        $sonuc    = '';

        foreach ($words as $word) {
            $sonuc .= strtoupper(substr($word, 0, 1));
        }
        return view('layouts.app', [
            'profile' => view('profile', compact('user', 'sonuc')),
        ]);
    }

    public function saveSelection(Request $request)
    {
        try {
            $color  = $request->input('selectedColor');
            $cardId = $request->input('card_id');

            if (! $color || ! $cardId) {
                return response()->json(['error' => 'Eksik veri gönderildi.'], 400);
            }

            $existing = backgrounds::where('card_id', $cardId)->where('type', '0')->first();

            if ($existing) {
                if ($existing->renk === $color) {
                    $existing->delete();
                    return response()->json(['message' => 'Arka plan silindi.', 'deleted' => true, 'renk' => $color, 'cardId' => $cardId]);
                } else {
                    $existing->renk = $color;
                    $existing->save();
                    return response()->json(['message' => 'Renk güncellendi.', 'updated' => true, 'renk' => $color, 'cardId' => $cardId]);
                }
            } else {
                $new          = new backgrounds();
                $new->renk    = $color;
                $new->card_id = $cardId;
                $new->type    = '0';
                $new->save();

                return response()->json(['message' => 'Yeni renk kaydedildi.', 'created' => true, 'renk' => $color, 'cardId' => $cardId]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function updateExplanation(Request $request)
    {
        $row              = card::where('id', $request->id)->first();
        $row->explanation = $request->explanation;
        $row->save();

        return response()->json(['success' => true]);
    }

}
