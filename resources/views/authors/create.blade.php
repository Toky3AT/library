@extends('layouts.app')

@section('content')
	<form action="/authors" method="post">
		@csrf
		<div class="w-2/3 bg-gray-200 mx-auto p-6 flex flex-col items-center shadow">
			<h1>Add New Author</h1>
			<div class="pt-4">
				<input type="text" name="name" placeholder="Full Name" class="rounded px-4 py-2 w-64">
				{{-- @if($errors->has('name'))
					<p class="text-red-600">{{$errors->first('name')}}</p>
				@endif --}}

				@error('name') <p class="text-red-600">{{$errors->first('name')}}</p> @enderror
			</div>
			<div class="pt-4">
				<input type="text" name="dob" placeholder="Date of Birth" class="rounded px-4 py-2 w-64">
				{{-- @if($errors->has('dob'))
					<p class="text-red-600">{{$errors->first('dob')}}</p>
				@endif --}}
				@error('dob') <p class="text-red-600">{{$errors->first('dob')}}</p> @enderror
			</div>
			<div class="pt-4">
				<button class="bg-blue-400 text-white rounded py-2 px-4">Add new author</button>
			</div>
		</div>
	</form>
@endsection