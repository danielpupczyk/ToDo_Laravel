@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">				
					<!--{{ Form::open(array('url' => 'tasks', 'method' => 'post')) }}-->
					{{ Form::open(array('route' => 'tasks.store', 'method' => 'post')) }}
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
							<input value="{{date('Y-m-d H:i:s')}}" type="datetime-local" name="deadline" id="deadline" class="form-control">
						</div>
						<div class="mb-1 mt-1"> 
							@if ($errors->any())
								<ul class="list-group">
									@foreach($errors->all() as $e)
										<li class="list-group-item list-group-item-danger">{{ $e }}</li>
									@endforeach
								</ul>
							@endif
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