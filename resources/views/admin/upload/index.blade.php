@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<h2>Subir Archivo</h2>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Subir</button>
</form>

@endsection