{{-- @extends('layout.main')
@section('container') --}}
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Custom CSS --}}

    <link rel="stylesheet" href="/css/loginstyle.css">
    {{-- End CSS --}}
    <title>Halaman Login</title>
  </head>
{{-- Form --}}
<body>
        <div class="box">
        <div class="title-box">
            <img src="{{ asset('suricataicon.png')}}" width="110%">
        </div>

        <div class="form-box">
        @csrf
          <form action="{{ route('postlogin') }}" method="post">
            {{-- @csrf --}}
            {{ @csrf_field() }}
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <hr>
            <button type="submit">Login</button>
            {{-- Pesan error--}}
            @if(session()->has('error'))
            <p class="text-danger"> {{ session('error') }} </p>
            @endif
             {{-- End Pesan Error --}}
          </form>
        </div>

    </div>
{{-- End Form --}}
</body>
</html>
{{--
@endsection --}}
