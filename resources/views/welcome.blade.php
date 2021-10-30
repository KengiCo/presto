<x-layout>
    <div class="container">
        <div class="my-5 row">
            <div class="col-12 text-center">
                @if (session('access.denied.revisor.only'))
                <div class="alert alert-danger">
                    Accesso non consentito -solo per revisori
                </div>
                @endif
                @if (session('access.denied.admin.only'))
                <div class="alert alert-danger">
                    Accesso non consentito -solo per admin
                </div>
                @endif
                <h1 class="ml11 mb-4">
                    <span class="text-wrapper">
                      <span class="line line1"></span>
                      <span class="letters">{{ __('ui.welcome')}}</span>
                    </span>
                  </h1>

                <!-- MAIN-CAROUSEL -->
                <div id="myCarousel" class="carousel slide pointer-event" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                            aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                            class="active " aria-current="true"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                            class=""></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img class="img-fluid" width="100%" height="100%" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">

                            <div class="container">
                                <div class="carousel-caption c-i-inset text-start">
                                    <h1 class="text-white text-wrapper">Abbigliamento</h1>
                                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                                    <p><a class="btn btn-lg btn-lr" href="#">Scopri di più</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img class="img-fluid" width="100%" height="100%" src="https://images.unsplash.com/photo-1556817411-31ae72fa3ea0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">

                            <div class="container">
                                <div class="carousel-caption c-i-inset">
                                    <h1 class="text-white text-wrapper">Sport</h1>
                                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                                    <p><a class="btn btn-lg btn-lr" href="#">Scopri di più</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" width="100%" height="100%" src="https://images.unsplash.com/photo-1589652717521-10c0d092dea9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">

                            <div class="container">
                                <div class="carousel-caption c-i-inset text-end ">
                                    <h1 class="text-white text-wrapper">Informatica</h1>
                                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                                    <p><a class="btn btn-lg btn-lr" href="#">Scopri di più</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!--NUMERI/STATS SITO-->
                <div class="container-card">
                    <div class="container my-5 py-5">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="card text-center shadow border-0">
                                    <div class="card-body bg-light">
                                        <h1 class="h1card">233</h1>
                                        <p class="text-uppercase mb-1 fw-bold">Spedizioni</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-truck icon" viewBox="0 0 16 16">
                                            <path
                                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card text-center shadow border-0">
                                    <div class="card-body bg-light">
                                        <h1 class="h1card">53</h1>
                                        <p class="text-uppercase mb-1 fw-bold">Transazioni</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                            <path
                                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card text-center shadow border-0">
                                    <div class="card-body bg-light">
                                        <h1 class="h1card">1233</h1>
                                        <p class="text-uppercase mb-1 fw-bold ">Utenti</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card text-center shadow border-0">
                                    <div class="card-body bg-light">
                                        <h1 class="h1card">2000</h1>
                                        <p class="text-uppercase mb-1 fw-bold">Recensioni</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                </div>

                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
