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
                            <div class="card-header bg-dark text-white"> Nome Utente # {{ Auth::user()->name }}</div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-4"><h3>Annunci salvati</h3></div>

                                    <div class="col-md-6">

                @foreach ($ads as $ad)
                <div class="col-10 d-flex justify-content-center mt-5">


                        <div class="card card-ad my-3 shadow border-0 text-center" style="width: 20rem;">
                            <div id="owl-demo" class="owl-carousel owl-theme bg-light">
                                @if ($ad->images->count())
                                    @foreach ($ad->images as $image)
                                        <div class="item"><img src="{{$image->getUrl(200, 200)}}" alt="Card-image"></div>
                                    @endforeach
                                @else
                                    <div class="item"><img class="card-img-top" src="\image\LOGOP (1).png" alt="Card-image"></div>
                                @endif
                            </div>
                            <div class="card-body bg-light">
                                <h4 class="card-title text-start"><a class="text-decoration-none c-ter" href="{{route('ads.show', compact('ad'))}}">{{$ad->title}}</a></h4>
                                <h5 class="card-text text-start">{{Illuminate\Support\Str::limit($ad->body, 25, $end='...')}}</h5>
                                <br>
                                <h6 class="text-start">
                                        <strong>Categoria:
                                        <a class="text-decoration-none" href="{{route('public.ads.category',[$ad->category->name,$ad->category->id])}}">{{$ad->category->name}}</a></strong>
                                    <br>
                                        <strong>Autore: </strong>{{$ad->user->name}}
                                    <br>
                                        <strong>Creato il: </strong>{{$ad->created_at->format('d/m/Y')}}
                                </h6>
                                <hr>
                                <h5 class="text-start">Prezzo: <strong class="c-ter">{{$ad->price}}€</strong></h5>
                                <div class="card-footer bg-light">
                                    @if (Auth::user()->adsFav->pluck('id')->contains($ad->id))
                                <form class="me-3" action="{{route('ads.detach_user', compact('ad'))}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-lg c-sec"><i class="fas fa-star "></i></button>
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
                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
