@extends('layouts.master')

@push('style')
<style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-size: 24px;
        }

        label{
            margin-right:20px;
        }

        form{
            background:#f5f5f5;
            padding:20px;
            border-radius:10px;
        }

        input[type="submit"]{
            background:#0098cb;
            border:0px;
            border-radius:5px;
            color:#fff;
            padding:10px;
            margin:20px auto;
        }

    </style>
@endpush

@section('content')
    <div style="width:70%;display: block;margin-left: auto;margin-right: auto;">

        <div class="container">
			<div class="content">

				<h1>File Upload</h1>
				<form action="{{ URL::to('photos/uploaded') }}" method="post" enctype="multipart/form-data">
                    @csrf
					<label>Select image to upload:</label>
				    <input type="file" name="file" id="file">
				    <input type="submit" value="Upload" name="submit">
				</form>

			</div>
		</div>
    </div>

@endsection
