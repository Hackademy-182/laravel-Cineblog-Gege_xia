<x-layout>
    @extends('layouts.app') @section('title', 'Home')
    @section('content') @include('partials.nav')
        @include('partials.hero')
        @include('partials.cards')
    @include('partials.footer') @endsection

</x-layout>
