@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">

        @foreach ($countries as $country)

        <a href="/country/{{$country['name']}}"><img src="{{$country['flag']}}" alt="{{$country['name']}}"
                title="{{$country['name']}}" width="10%" style="margin-right: 15px"></a>

        @endforeach

    </div>
</div>

@endsection