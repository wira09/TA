@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-3">Isi Data Tracer Study</h1>
        <form action="{{ route('user.tracer.store') }}" method="POST" class="mt-3">
            @csrf
            @include('user.tracer.form')
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('user.tracer.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
