@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your Tasks</div>

                <div class="card-body">				

					<table class="table text-center">
						<thead>
							<tr>
								<th scope="col" class="col-md-2">Title</th>
								<th scope="col" class="col-md-6">Description</th>
								<th scope="col" class="col-md-4">Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach($tasks as $task)
							@if($task->done_at!=null)
								<tr class="table-success">
							@elseif($task->deadline < date('Y-m-d H:i:s'))
								<tr class="table-danger">
							@else
								<tr>
							@endif
								<td>{{$task->title}}</td>
								<td>{{$task->description}}</td>
								<td class="text-center"><button type="button" class="btn btn-info">More</button><button type="button" class="btn btn-primary ml-1">Edit</button><button type="button" class="btn btn-danger ml-1">Delete</button></td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{$tasks->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
