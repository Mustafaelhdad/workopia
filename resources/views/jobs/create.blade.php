@extends('layout')

@section('title')
Create Job
@endsection

@section('content')
				<h1>Create new job</h1>
				<form action="/jobs" method="POST">
						@csrf
						<input name="title" type="text" placeholder="title">
						<input name="description" type="text" placeholder="description">
						<button type="submit">Submit</button>
				</form>
@endsection
