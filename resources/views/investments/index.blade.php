@extends('layouts.app')

@section('content')
    <h1>Investment</h1>
    <a href="{{url('/investments/create')}}" class="btn btn-success">Create Investment</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Acquired Value</th>
            <th>Acquired Date</th>
            <th>Recent Value</th>
			<th>Recent Date</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($Investment as $Investment)
            <tr>
                <td>{{ $Investment->customer->cust_number }}</td>
                <td>{{ $Investment->customer->name }}</td>
                <td>{{ $Investment->category }}</td>
                <td>{{ $Investment->description }}</td>
                <td>{{ $Investment->acquired_value }}</td>
                <td>{{ $Investment->acquired_date }}</td>
                <td>{{ $Investment->recent_value }}</td>
				<td>{{ $Investment->recent_date }}</td>
                <td><a href="{{url('investments',$Investment->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('investments.edit',$Investment->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['investments.destroy', $Investment->id]]) !!}
            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this investment?')">
            
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection


