<x-layout>
    @if ($ad)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card bg-light border-0 shadow mt-5">
                    <div class="card-header"> Annuncio # {{$ad->id}}</div>

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

                        <div class="row">
                            <div class="col-md-2"><h3>Immagini</h3></div>
                            <div class="col-md-10">
                                @foreach ($ad->images as $image)
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <div><img src="{{$image->getUrl(200, 200)}}" class="card-img-top" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        Adult: {{$image->adult}} <br>
                                        Spoof: {{$image->spoof}} <br>
                                        Medical: {{$image->medical}} <br>
                                        Violence: {{$image->violence}} <br>
                                        Racy: {{$image->racy}} <br>

                                        <b>Labels</b><br>
                                        <ul>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <li>{{ $label }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        {{$image->id}} <br>
                                        {{$image->file}} <br>
                                        {{Storage::url($image->file)}} <br>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6">
                                <form action="{{route('revisor.reject', $ad->id)}}" method=POST>
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                            <div class="col-md-6 text-end">
                                <form action="{{route('revisor.accept', $ad->id)}}" method=POST>
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <h3 class="text-center pt-3">Non ci sono annunci da revisionare</h3>
            </div>
        </div>
    </div>
    @endif
    <div style="margin-top : 700px"></div>
</x-layout>
