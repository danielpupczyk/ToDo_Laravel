@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					@if($user->first_name!=null)
						Hello {{$user->first_name}}!
					@else
						Hello!
					@endif
				</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					
                    You are logged in as {{$user->email}}! Now you can manage your tasks by choose "My Tasks" from navbar.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
