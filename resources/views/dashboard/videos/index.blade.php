@extends('dashboard.layouts.app')

@section('content')
@foreach($videos as $video)
    {{$video->name}}
@endforeach
@endsection
