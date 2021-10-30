<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header bg-dark text-white">
                        Contattaci
                    </div>
                    <div class="card-body bg-light border-0 shadow">
                        @if (session('message'))
                        <div class="alert alert-success my-3">
                            {{session('message')}}
                        </div>
                        @endif
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger my-2">
                            <p>{{$error}}</p>
                        </div>
                        @endforeach

                        @endif

                        <div class="col-12">
                            <h1 class="text-center">Ciao !</h1>
                            <form action="{{route('save_guest_contact')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row my-1">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" name="name" value="{{old('nome')}}" class="form-control" id="name">
                                </div>
                                <div class="form-group row my-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email">
                                </div>
                                <div class="form-group row my-1">
                                    <label for="phone" class="form-label">Telefono</label>
                                    <input type="tel" name="phone" value="{{old('phone')}}" class="form-control" id="phone">
                                </div>
                                <div class=" form-group row my-1">
                                    <label for="body">Messaggio</label>
                                    <textarea name="body" id="body" cols="30" rows="10"
                                    class="form-control">{{old('body')}}</textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-lr shadow">Invia</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
