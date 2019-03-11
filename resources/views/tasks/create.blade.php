@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">				
					
					@if ($errors->any())
						<ul class="alert alert-danged">
							@foreach($errors->all() as $e)
								<li>{{ $e }}</li>
							@endforeach
						</ul>
					@endif
					
					{{ Form::open(array('url' => 'tasks', 'method' => 'post')) }}
						<div class="form-group">
							{{Form::label('title', 'Title:')}}
							{{Form::text('title', null,['class'=>'form-control'])}}
						</div>
						<div class="form-group">
							{{Form::label('description', 'Description:')}}
							{{Form::textarea('description', null,['class'=>'form-control'])}}
						</div>
						<div class="form-group">
							{{Form::label('deadline', 'Deadline:')}}
							<input value="2019-03-12T19:30" type="datetime-local" name="deadline" id="deadline" class="form-control">
						</div>
						<div class="text-center">
							{{Form::submit('Submit!',$artibutes = ["class"=>"btn btn-primary"])}}
							{{ link_to(URL::previous(),'Back',['class'=>'btn btn-secondary']) }}
						</div>
					{{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection