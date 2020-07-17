@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">

        <img src="{{$country['flag']}}" alt="{{$country['name']}}" width="50%" style="margin-right: 15px">
        <p>Nome: {{$country['nativeName']}}</p>
        <p>Capital: {{$country['capital']}}</p>
        <p>Região: {{$country['region']}}</p>
        <p>Sub-região: {{$country['subregion']}}</p>
        <p>População: {{$country['population']}}</p>
        <p>Linguas: {{implode(array_column($country['languages'], "nativeName"), ", ")}}</p>

        <div>
            @foreach ($neighbors as $neighbor)

            <a href="/country/{{$neighbor['name']}}"><img src="{{$neighbor['flag']}}" alt="{{$neighbor['name']}}"
                    title="{{$neighbor['name']}}" width="20%" style="margin-right: 10px"></a>

            @endforeach
        </div>
    </div>
</div>

@endsection