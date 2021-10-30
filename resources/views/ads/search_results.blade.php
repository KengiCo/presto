<x-layout>
    <section class="content-section" id="portfolio">
        <div class="container">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary">Risultati ricerca per {{ $q }}</h3>
            </div>
            <div class="row no-gutters">
                @foreach ($ads as $ad)
                <div class="col-12 col-md-4 d-flex flex-wrap justify-content-center mt-5">


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
                            </div>
                            {{-- TASTO REVISORE --}}
                            @if(Auth::user())
                                <div class="card-footer bg-light text-center">
                                    <form action="{{route('revisor.undo', $ad->id)}}" method=POST>
                                    @csrf
                                    <button type="submit" class="btn btn-lr text-center">Revisiona</button>
                                    </form>
                                </div>
                            @endif
                        </div>

                </div>
            @endforeach
            </div>
        </div>
    </section>
</x-layout>
