@extends('layouts.dashboard')

@section('content')
<div class="container" style="margin-top: calc(20% - 100px)">
  <div class="row justify-content-center">
    <div class="col-8">
        <!-- /.card -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Questionnaires</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(count($questionnaires) > 0)
                        @foreach($questionnaires as $key=>$questionnaire)
                          <tr>
                            <td>{{++$key}}</td>
                            <td><a href="#">{{$questionnaire->title}}</a></td>
                            <td>
                              <div class="row">
                                <div class="col-8"><a class="btn btn-dark" href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">Take Survey</a> </div>
                                <div  class="col-4"><a class="btn btn-dark" href="/">Back</a> </div>
                              </div>
                              
                            </td>

                          </tr>
                        @endforeach
                      @endif
                     
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.card -->
    </div>
      <!-- Main content -->
         
          <!-- /.row -->
      <!-- /.content -->
  </div>
</div>

@endsection

