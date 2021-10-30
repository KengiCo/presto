<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card my-2 shadow border-0" style="width: 18rem;">
                <img src="{{$image}}" class="card-img-top" alt="...">
                <div class="card-body bg-light">
                  <h4 class="card-title text-start"><a href="{{$link}}">{{$title}}</a></h4>
                  <h5 class="card-text text-start">{{$body}}</h5>
                  <h5 class="text-center">{{$price}}€</h5>
                  <strong>Category: <a href="{{$href}}">{{$category}}</a></strong><i>{{$date}} - {{$user}}</i>
                </div>
            </div>
        </div>
    </div>
</div>
