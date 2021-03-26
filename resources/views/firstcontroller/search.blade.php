@extends("templates.general")

@section('content')
<section class="container">
    <div class="search_result"> 
<h1>Recherche de "{{$search}}"<h1>
<h4>Utilisateurs</h4>
<ul class="search_users">
@foreach($users as $u)
        <li><a href="/user/{{$u->id}}">{{$u->name}}</a></li>
    @endforeach
</ul>

<h4>Chanson</h4>
@include("partials._songs")
</div>
<section>
@endsection