@extends('layouts.master')

@section('content')
<style>
        body {
        height: 100%;
        }

        .vertical-center {
        min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
        }
</style>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if(session('fail'))
        <div class="alert alert-danger" role="alert">
            {{session('fail')}}
        </div>
    @endif

    <div class="row text-center vertical-center col-lg-4">
        <div class="col-lg-4">
            <h1 class="mb-2 display-4">Welcome, {{auth()->user()->name}}!</h1>
            <blockquote class="blockquote">
            <p class="mb-2">Thought is the wind, knowledge the sail, and mankind the vessel.</p>
            <footer class="blockquote-footer"><cite title="Source Title">Augustus Hare</cite></footer>
            </blockquote>
            <p><a class="btn btn-secondary" href="/dashboard/{{auth()->user()->id}}/edit" role="button">Edit profile</a></p>
        </div>
    </div>

@endsection
    

