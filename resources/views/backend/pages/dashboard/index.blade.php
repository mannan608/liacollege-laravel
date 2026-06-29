@extends('backend.layouts.app')

@section('content')

    <div class="w-[480px]">
        <form action="">
            <x-form.file-uploader name="image" label="Image" value="" multiple=true  />
        </form>
    </div>
@endsection
