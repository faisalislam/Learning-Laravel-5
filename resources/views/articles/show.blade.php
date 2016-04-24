@extends('app')

@section('content')
 <h1>{{ $article->title }}</h1>

 		<article>
 			<div classs="body">{{ $article->body }}</div>
 		</article>	
 	@stop