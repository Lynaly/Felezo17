@extends('layouts.layout')
@section('title', 'Hírek')
@section('icon', 'newspaper-o')
@section('content')
    @each('news.news', $news, 'news', 'news.empty')
@endsection