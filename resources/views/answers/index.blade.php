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
                <h1 class="m-0 text-dark">Answers</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Answers</li>
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
                    <h3 class="card-title">View Answers</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Questionnaire Title</th>
                        <th>Questionnaire Purpose</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Participant Name</th>
                        <th>Participant Email</th>
                        <th>Date Created</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if(count($answers) > 0)
                            @foreach($answers as $key=>$answer)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$answer->title}}</td>
                                <td>{{$answer->purpose}}</td>
                                <td>{{$answer->question}}</td>
                                <td>{{$answer->answer}}</td>
                                <td>{{$answer->name}}</td>
                                <td>{{$answer->email}}</td>
                                <td>{{$answer->created_at}}</td>
                              </tr>
                            @endforeach
                          @endif
                         
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Questionnaire Title</th>
                        <th>Questionnaire Purpose</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Participant Name</th>
                        <th>Participant Email</th>
                        <th>Date Created</th>
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

