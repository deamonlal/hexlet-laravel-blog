@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{Form::model($article, ['route' => 'articles.store'])}}
        {{Form::label('name', 'Title')}}
        {{Form::text('name')}}<br>
        {{Form::label('body', 'Content')}}
        {{Form::textarea('body')}}<br>
        {{Form::submit('Create')}}
    {{Form::close()}}
@endsection