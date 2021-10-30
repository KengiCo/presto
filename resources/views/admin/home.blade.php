<x-layout>
    @if ($ad)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Utente # {{$user->id}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><h3>Utente</h3></div>
                            <div class="col-md-10">
                                {{$user->name}},
                                {{$user->email}},
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6">
                                <form action="{{route('admin.reject', $user->id)}}" method=POST>
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                            <div class="col-md-6 text-end">
                                <form action="{{route('admin.accept', $user->id)}}" method=POST>
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
               <h3>Non ci sono più richieste di utenti da revisionare</h3>
            </div>
        </div>
    </div>
    @endif
</x-layout>
