@extends("templates.general")
@section('content')
<div class="all_form container">
<h1 class="creat_title">Ajoutez une chanson !<h1>

@include("partials._errors")
<div class="new_song">
<form method="post" action="/songs" enctype="multipart/form-data" data-pjax>
        @csrf

        <input type="text" name='title' placeholder="Titre et auteur" value="{{old('title')}}" />
        <br />
        <label for="song" class="label-file">Choisir une chanson</label><br/><br/>
        <input class="input-file"  type="file" name='song' id="song" value="URL of the song" />
        <label for="img" class="label-file-img">Choisir une image</label>
        <input class="input-file"  type="file" name='img' id="img" value="img of the song"  />
        <br />
       <input type="submit"/>

    </form>
</div>
</div>
@endsection