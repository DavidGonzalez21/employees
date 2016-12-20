@include('headers.header')

@include('content.head_container')

<h3>{{ $task->task_name }}</h3>

<table class="table table-bordered">
  <tbody>
	<tr>
		<td>{{ $task->start_work }}</td>
		<td>{{ $task->end_work }}</td>
		<td>{{ $task->client->email }}</td>
		<td>
			@foreach ($task->employees as $employee)
				{{ $employee->full_name }}
			@endforeach
		</td>
	</tr>
  </tbody>
</table>