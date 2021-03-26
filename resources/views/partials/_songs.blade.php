<section >
<div class="main-content">
@foreach($songs as $s )




    <div class="infos">
        <div class="first-item">
        
            <div class="cover" style="background-image: url({{$s->img}});
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 300px;
    height: 300px;
    margin-right: 20px;
   
    ">
          <div class="filter">
            <a href="#" data-file="{{$s->url}}" class="song" ><img id="play" class="play" src="../../../../image/group.png"/></a>
            
            </div>
      </div>
          <div class="all_infos">
         <div class="infos_title">
        
            <a  class="title">{{ $s->title }}</a>
            <div>
            <a href="/user/{{$s->user->id}}" class="users">{{$s->user->name}}</a>
</div>
        </div>
        
            <div class="infos_like">

                 @auth
                         @if(Auth::user()->ILike->contains($s->id))
                            <a class="like"href="/like/{{$s->id}}"><img src="../../../../image/like-plein.svg"></a>
                         @else
                        <a class="like" href="/like/{{$s->id}}"><img src="../../../../image/like.svg"></a>
                     @endif
                @endauth
                @guest
                 <a class="like" href="/login"><img src="../../../../image/like.svg"></a>
                     @endguest
                    
            </div>
            
            </div>  
            <p class="theylike">aimé par {{$s->theyLike()->count()}} personnes </p>
        </div>
        
    </div>
        
    

   
  
       
   
@endforeach
</div>
</section>


