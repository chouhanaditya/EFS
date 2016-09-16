@extends('layouts.app')
@section('content')
    <h1>Investment </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Category</td>
                <td><?php echo ($Investment['category']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo ($Investment['description']); ?></td>
            </tr>
            <tr>
                <td>Acquired Value</td>
                <td><?php echo ($Investment['acquired_value']); ?></td>
            </tr>
            <tr>
                <td>Acquired Date </td>
                <td><?php echo ($Investment['acquired_date']); ?></td>
            </tr>
            <tr>
                <td>Recent Value</td>
                <td><?php echo ($Investment['recent_value']); ?></td>
            </tr>
			<tr>
                <td>Recent Date</td>
                <td><?php echo ($Investment['recent_date']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

