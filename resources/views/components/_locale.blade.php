<form action="{{route('locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link btn-lg btn-block" style="background-color: transparent; border:none;">
        <div class="flag-icon flag-icon-{{$nation}}"></div>
    </button>
</form>
