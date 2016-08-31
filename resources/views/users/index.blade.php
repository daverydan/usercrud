@extends('layouts.user')
@section('title', 'Users')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

<!-- { Form::open(['method'=>'GET','url'=>'users','class'=>'navbar-form navbar-left','role'=>'search']) }
	<div class="input-group custom-search-form">
	    <input type="text" class="form-control" name="search" placeholder="Search...">
	    <span class="input-group-btn">
	        <button class="btn btn-default-sm" type="submit">
	            <i class="fa fa-search"></i>Search
	        </button>
	    </span>
	</div>
{ Form::close() } -->

@if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
	            <th>Username</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->name }}</td>
                    <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                    <!-- Delete Button -->
					{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}                       
						<button type="submit" class="btn btn-danger" Onclick="return ConfirmDelete();">Delete</button>
					{{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
    <ul class="pagination">{{ $users->links() }}</ul>
@else
    There are no users
@endif

@yield('scripts')
	@section('scripts')
	    <script>
	        function ConfirmDelete()
	        {
	            var x = confirm("Are you sure you want to delete?");
	            if (x)
	                return true;
	            else
	                return false;
	        }
	    </script>
	@endsection
@stop