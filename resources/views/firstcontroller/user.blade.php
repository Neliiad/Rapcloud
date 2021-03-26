@extends("templates.general")

@section('content')
<div class="infos_users container">
    
<h1>Bienvenue chez {{$user -> name}}</<h1>


<h3>Statistiques</h3>
<p>Propriétaire de {{$user->songs()->count()}} chansons</p>
<p>Suivi par {{$user->TheyLikeMe()->count()}} personnes et suit {{$user->ILikeThem()->count()}} personnes</p>
    
    @auth
        @if(Auth::id() != $user->id)
            @if(Auth::user()->ILikeThem->contains($user->id))
                <p class="align-right"><a class="btn-followed" href="/changeLike/{{$user->id}}">Suivi</a></p>
            @else
                <p class="align-right"><a class="btn-follow" href="/changeLike/{{$user->id}}">Suivre</a></p>
            @endif
        @endif
    @endauth
    @guest
       <p class="align-right"><a class="btn-follow" href="/login">Suivre</a></p>
    @endguest

<div class="song_upload">
<h1 >Chanson de {{$user -> name}}</h1>

@include("partials._songs", ["songs" => $user->songs])

</div>



    <hr>



<div class="song_like">
<h1 >Coup de coeur</h1>

@include("partials._songs", ["songs" => $user->ILike])

</div>


</div>
@endsection