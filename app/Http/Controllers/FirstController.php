<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FirstController extends Controller
{
   public function index(){
       $songs=Song::all();
       Song::orderByDesc(
        Like::select('user_id')
            ->whereColumn('songs.id', 'song_id')
            ->orderByDesc('song_id')
            ->limit(1)
    )->get();
       return view("firstcontroller.index", ["songs" => $songs]);
       
      
   }




   public function about(){
    return view("firstcontroller.about");
}

    public function articles($id){
     return view("firstcontroller.articles" ,["id" => $id]);
}
  
    public function create(){
    return view("firstcontroller.create");
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required|min:4|max:255',
        'song' => 'required|file|mimes:mp3,ogg',
        'img' => 'required|file|mimes:png,jpeg,jpg'
       
    ]);
    $song = new Song();
    $song->title = $request->input('title');
    $song->url = $request->input('url');
    $song->img = $request->input('img');
    $name = $request->file('song')->hashName();
    $nameImg = $request->file('img')->hashName();
    $request->file('song')->move("uploads/".Auth::id(), $name);
    $request->file('img')->move("uploads/".Auth::id(), $nameImg);
    $song->url = "/uploads/".Auth::id()."/".$name; 
    $song->img = "/uploads/".Auth::id()."/".$nameImg; 
    $song->votes = 0;
    $song->user_id = Auth::id();
    $song->save(); 

    return redirect("/");

}

 public function user($id){
     $user = User::findorFail($id);
    return view("firstcontroller.user", ["user" => $user]);
}

public function changeLike($id) {
    Auth::user()->ILikeThem()->toggle($id);
   return back()->with('toastr', ["status"=>"success", "message" => "Modification du suivi"]);
}

public function like($id) {
    Auth::user()->ILike()->toggle($id);
    return back();
}


public function search($search) {

    $users = User::whereRaw("name LIKE CONCAT(?, '%')", [$search])->orderBy('id', 'desc')->get();
    $songs = Song::whereRaw("title LIKE CONCAT('%' ,?, '%')", [$search])->orderBy('votes', 'desc')->get();
  
    return view("firstcontroller.search" , ["search" => $search , "songs" => $songs , "users" => $users]);

}

}