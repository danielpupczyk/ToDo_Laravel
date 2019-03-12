@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your Tasks</div>

                <div class="card-body">		

					@if(count($tasks)==0)
						<div class="alert alert-primary" role="alert">
						  You haven't added tasks yet.
						</div>
					@else
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
								@if($task->status=='done')
									<tr class="table-success">
								@elseif($task->deadline < date('Y-m-d H:i:s'))
									<tr class="table-danger">
								@else
									<tr>
								@endif
									<td>{{$task->title}}</td>
									<td>{{$task->description}}</td>
									<td class="text-center">
											{{ Form::model($task, ['route' => ['tasks.show',$task],'method' => 'GET']) }}
												<input type="submit" value="More" class="btn btn-info ml-1 float-left">
											{{ Form::close()}}
											{{ Form::model($task, ['route' => ['tasks.edit',$task],'method' => 'GET']) }}
												<input type="submit" value="Edit" class="btn btn-primary ml-1 float-left">
											{{ Form::close()}}
											<!--<button type="button" class="btn btn-info float-left">More</button>
											<button type="button" class="btn btn-primary ml-1 float-left">Edit</button>-->
											{{ Form::model($task, ['route' => ['tasks.delete',$task]]) }}
												<input type="submit" value="Delete" class="btn btn-danger ml-1 float-left">
												{{ method_field('delete') }}
												{{ csrf_field() }}
											{{ Form::close()}}
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="col-md-8 float-left">
							{{$tasks->links()}}
						</div>
						<div class="col-md-4 float-left">
							<table class="table">
								<tr>
									<td class="col-md-6"></td>
									<td class="col-md-6">Task in progress</td>
								</tr>
								<tr>
									<td style="background-color:#c7eed8"></td>
									<td>Task is done</td>
								</tr>
								<tr>
									<td style="background-color:#f7c6c5"></td>
									<td>Deadline is over</td>
								</tr>
							</table>
						</div>
						<div style="clear:both"></div>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
