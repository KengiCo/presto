<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light border-0 shadow my-5">
                    <div class="card-header bg-dark text-white">
                        Nuovo Annuncio
                    </div>
                    <div class="card-body">
                        {{-- <h3>DEBUG:: SECRET {{$uniqueSecret}}</h3> --}}

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
                            <h1 class="text-center">{{Auth::user()->name}}</h1>
                            <form action="{{route('ads.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input
                                    type="hidden"
                                    name="uniqueSecret"
                                    value="{{$uniqueSecret}}">
                                <label for="category" class="col-md-4 col-form-label">Categoria</label>
                                <div class="col-md-6">
                                    <select name="category" id="category" class="border-0 mb-3">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{old('category')==$category->id ? 'selected': ''}}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="title">Titolo</label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control" id="title">
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="body">Annuncio</label>
                                    <textarea name="body" id="body" cols="30" rows="10"
                                    class="form-control">{{old('body')}}</textarea>
                                </div>
                                <div class="mb-3 form-group row">
                                    <label for="price" class="form-label">Prezzo</label>
                                    <input name="price" type="number" price="price" class="form-control" id="price" aria-describedby="titleHelp" value="{{old('price')}}">
                                </div>
                                <div class="form-group row">
                                    <label for="images" class="col-md-12 col-form-label text-md-end">Immagini</label>
                                    <div class="col-md-12">

                                        <div class="dropzone" id="drophere"></div>
                                        @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-lr shadow mt-2">Crea</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


