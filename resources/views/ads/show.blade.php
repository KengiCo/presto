<x-layout>

    <div class="container">
        <div class="row">
            @if (session('message'))
            {{session('message')}}
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger my-2">
                <p>{{$error}}</p>
            </div>
            @endforeach
            @endif
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card bg-light border-0 shadow mt-5">
                            <div class="card-header bg-dark text-white"> Annuncio # {{$ad->id}}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"><h3>Utente</h3></div>
                                    <div class="col-md-10">
                                        #{{$ad->user->id}},
                                        {{$ad->user->name}},
                                        {{$ad->user->email}},
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-2"><h3>Titolo</h3></div>
                                    <div class="col-md-10"> {{$ad->title}}</div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-2"><h3>Descrizione</h3></div>
                                    <div class="col-md-10">{{$ad->body}}</div>

                                </div>

                                <hr>

                                <div class="row">
                                    
                                    <div class="col-md-4"><h3>Immagini</h3></div> 
                                    
                                    <div class="col-md-6">
                                    <div id="owl-demo" class="owl-carousel owl-theme bg-light">
                                        @if ($ad->images->count())
                                            @foreach ($ad->images as $image)
                                                <div class="item"><img src="{{$image->getUrl(200, 200)}}" alt="Card-image"></div>
                                            @endforeach
                                        @else 
                                            <div class="item"><img class="card-img-top" src="\image\LOGOP (1).png" alt="Card-image"></div>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                                <div>
                                @if (Auth::user()->adsFav->pluck('id')->contains($ad->id))
                            <form class="me-3" action="{{route('ads.detach_user', compact('ad'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-lg c-sec"><i class="fas fa-star"></i></button>
                            </form>
                            @else
                            <form class="me-3" action="{{route('ads.attach_user', compact('ad'))}}" method="POST">
                                @csrf
                                <button type="submit" class="btn-lg bg-transparent"><i class="far fa-star"></i></button>
                            </form>
                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
