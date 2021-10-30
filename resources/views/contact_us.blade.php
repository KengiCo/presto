<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light border-0 shadow my-5">
                    <div class="card-header">
                        Diventa Revisore
                    </div>
                    <div class="card-body">
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
                            <h1 class="text-center">Ciao {{Auth::user()->name}}</h1>
                            <form action="{{route('save_contact')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="id" class="form-control" id="id">
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" value="{{Auth::user()->name}}" name="name" class="form-control" id="name">
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" value="{{Auth::user()->email}}" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="body">Parlaci di te:</label>
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
