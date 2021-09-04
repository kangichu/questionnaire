@extends('layouts.dashboard')

@section('content')
 
    <!-- Navbar -->
    @include('topnav.topnav')
    <!-- /.navbar -->
    @include('sidenav.sidenav')
    <!-- Main Sidebar Container -->
    

        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Questions</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Questions</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                @if (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
                @endif
                @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                @endif
              </div>
            </div>
            <!-- /.card -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">View Questions</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Questionnairie</th>
                        <th>Date Created</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if(count($questions) > 0)
                            @foreach($questions as $key=>$question)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->created_at}}</td>
                                <td>
                                  <button type="button" class="btn btn-block btn-danger submit" data-toggle="modal" data-target="#modal-{{$question->id}}">Delete</button>
                                  <div class="modal fade" id="modal-{{$question->id}}">
                                    <div class="modal-dialog modal-sm">
                                      <form action="/questionnaires/{{ $question->questionnaire_id }}/questions/{{ $question->id }}" method="post">
                                      @method('DELETE')
                                      @csrf
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Delete Questionnaire</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Are you sure you want to delete this Question: <br><br> <strong style="text-transform: capitalize; font-size: 24px">{{$question->question}}</strong> </p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete Question</button>
                                          </div>
                                        </div>
                                      </form>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  
                              </tr>
                            @endforeach
                          @endif
                         
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Questionnairie</th>
                        <th>Date Created</th>
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
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
    </aside>

    <!-- /.control-sidebar -->
    @include('footer.footer')
    <!-- Main Footer -->

@endsection

