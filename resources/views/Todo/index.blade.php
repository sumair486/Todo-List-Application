@extends('layouts.app')

@section('main')

{{-- session --}}
@if ($message = Session::get('success'))
<div style="display: flex;justify-content: center" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<div  class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
</div>
</div>
</div>
@endif

{{-- task --}}
<h1 class="text-center">Todo list application</h1>


<div style="display: flex;justify-content: center" class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search tasks">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">Search</button>
                </div>
            </div>


            <form method="POST" action="{{ route('home') }}">
                @csrf
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="task">Task</label>
                    <input name="task_name" type="text" class="form-control mb-2" id="task" placeholder="Enter task">
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Add Task</button>
                    <a class="btn btn-primary mb-2" href="{{ route('export') }}">Export</a>
                    
                  </div>
                </div>
              </form>


              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <form  method="POST" action="{{ route('import') }} " enctype="multipart/form-data">
                      @csrf
                      <div class="form-row align-items-center">
      
                        <div class="col">
                          {{-- <label style="font-weight:bold">Import files</label> --}}
                          <input type="file" name="file">
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                          
      
                          {{-- <a class="btn btn-primary mb-2" href="{{ route('export') }}">Export</a> --}}
                        </div>
      
                      </div>
                    </form>
                  </div>
                </div>
              </div>


            <table class="table table-striped table-hover table-bordered">
                <thead>
                
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Status</th>

                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <!-- To-do list items will be dynamically added here -->
                  @foreach ($todo as $key=>$todos )
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $todos->task_name }}</td>
                        <td>@if($todos->status == "Done") 
                          <a href="{{url('cancel',$todos->id)}}" class="btn btn-success btn-rounded" type="button">Done</a>
                      @else
                          <a href="{{url('done',$todos->id)}}"  class="btn btn-danger btn-rounded" type="button">Cancel</a>
                      @endif
                        </td>
                        <td>
                            <a style="border-radius: 20px 20px" class="btn btn-success" href="">Edit</a>
                            <a style="border-radius: 20px 20px" class="btn btn-danger" href="">Delete</a>
                        </td>

                      </tr>
                  @endforeach
                </tbody>
              </table>
              
              
        </div>
    </div>
</div>

@endsection

