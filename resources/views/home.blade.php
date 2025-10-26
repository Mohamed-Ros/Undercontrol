@extends('layouts.app')

@section('title', 'Under Control - الرئيسية')

@section('content')
    @include('sections.preloader')

    @include('sections.header')
    @include('sections.statistics')
    @include('sections.achievements')
    @include('sections.courses')
    @include('sections.projects')
    @include('sections.languages')
    @include('sections.why-choice')
    @include('sections.questions')
@endsection
