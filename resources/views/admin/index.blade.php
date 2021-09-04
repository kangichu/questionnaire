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
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Questionnaires</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Questionnaire Title</th>
                        <th>Number of Questions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if(count($questionnaires) > 0)
                            @foreach($questionnaires as $key=>$questionnaire)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$questionnaire->title}}</td>
                                <td>{{$questionnaire->questions->count()}}</td>
                              </tr>
                            @endforeach
                          @endif
                         
                        
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Questionnaire Title</th>
                        <th>Number of Questions</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Answers</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="table2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Number of Answers</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if(count($answers) > 0)
                            @foreach($answers as $key=>$answer)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$answer->question}}</td>
                                <td>{{$answer->occurences}}</td>
                              </tr>
                            @endforeach
                          @endif
                          
                        
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Number of Answers</th>
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

          </div><!-- /.container-fluid -->
        </section>
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

