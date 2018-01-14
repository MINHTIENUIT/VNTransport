@extends('layouts.app')

@section('content')
<form action="{{ route('post_img') }}" method="post" enctype="multipart/form-data">
	<div class="file-field">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="btn btn-primary btn-sm">
			<span>Choose file</span>
			<input type="file" name="imgFile">
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text" placeholder="Upload your file">
		</div>

		<button class="btn btn-primary btn-sm" action='submit'>Submit</button>
	</div>
</form>

@endsection