@extends('layouts.app')

@section('main')



<table class="table table-striped table-dark">
    <thead>
      <tr style="background-color: gray">
        <th style="font-size: 15px;background-color: gray">S,No</th>
        <th style="font-size: 15px;background-color: gray">Task</th>
        <th style="font-size: 15px;background-color: gray">Status</th>
      </tr>
    </thead>
    <tbody>
     
        @foreach($todo as $key=>$todos)
        <tr>
            <td style="font-size: 15px;background-color: gray">{{ $key+1}}</td>
            <td style="font-size: 15px;background-color: gray">{{ $todos->task_name }}</td>
            <td style="font-size: 15px;background-color: gray"> {{ $todos->status }}</td>
        </tr>
    @endforeach
      
    </tbody>
  </table>


@endsection