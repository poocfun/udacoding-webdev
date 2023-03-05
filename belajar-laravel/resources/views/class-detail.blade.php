@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')

    <h2>Anda Melihat data detail class{{ $class->name }}</h2>

    <div class="mt-5">
        <h4>Homeroom teacher:{{ $class->homeroomTeacher->name }}</h4>
    </div>

    <div class="mt-5">
        <h4>List Student</h4>
        <ol>
            @foreach ($class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
