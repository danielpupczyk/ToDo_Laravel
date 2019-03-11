@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Info about {{$task->title}}</div>

                <div class="card-body">				
					
					<table class="m-auto table table-striped text-center col-md-8">
						<tbody>
							<tr>
								<td class="col-md-4">Title:</td>
								<td class="col-md-8">{{$task->title}}</td>
							</tr>
							<tr>
								<td class="col-md-4">Description:</td>
								<td class="col-md-8">{{$task->description}}</td>
							</tr>
							<tr>
								<td class="col-md-4">Added at:</td>
								<td class="col-md-8">{{$task->created_at}}</td>
							</tr>
							<tr>
								<td class="col-md-4">Deadline:</td>
								<td class="col-md-8">{{$task->deadline}}</td>
							</tr>
							<tr>
								<td class="col-md-4">Last update:</td>
								<td class="col-md-8">{{$task->updated_at}}</td>
							</tr>
							<tr>
								<td class="col-md-4">Done at:</td>
								<td class="col-md-8">@if($task->done_at==null)Not yet @else {{$task->done_at}} @endif</td>
							</tr>
						</tbody>
					</table>
					{{ Form::model($task, ['route' => ['tasks.edit',$task],'method' => 'GET']) }}
						<input type="submit" value="Edit" class="btn btn-primary ml-1 float-left">
					{{ Form::close()}}
					{{ Form::model($task, ['route' => ['tasks.delete',$task]]) }}
						<input type="submit" value="Delete" class="btn btn-danger ml-1 float-left">
						{{ method_field('delete') }}
						{{ csrf_field() }}
					{{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection