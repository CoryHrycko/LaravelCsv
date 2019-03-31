@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.long.name', 'Laravel Csv Magic Parser') }}
                </div>
                <div class="container links">
                    <a href="/import">New Import</a>
                    <a href="/display">Display Tree</a>
                    <a href="/display/delete" class="danger"> Delete Danger</a>
                </div>

            </div>
        </div>
@endsection
