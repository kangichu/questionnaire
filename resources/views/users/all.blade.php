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
                <h1 class="m-0 text-dark">All Users</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">All Users</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <!-- /.card -->
            <div class="card card-primary card-outline">
              
              <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Super Admin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Admin</a>
                  </li>
                </ul>
                <div class="tab-custom-content">
                  <p class="lead mb-0">User Details</p>
                </div>
                <div class="tab-content" id="custom-content-above-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="table1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                            @if(count($supers) > 0)
                              @foreach($supers as $key=>$super)

                                <tr>
                                  <td>{{++$key}}</td>
                                  <td>{{$super->name}}</td>
                                  <td>{{$super->email}}</td>
                                  <td>{{$super->mobile}}</td>
                                  <td>
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-{{$super->mobile}}">edit</button>
                                        <div class="modal fade" id="modal-{{$super->mobile}}">
                                          <div class="modal-dialog modal-sm">
                                            {!! Form::open(['action' => ['UserController@update', $super->id], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title">Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                @csrf
                                                {{Form::hidden('_method', 'PUT')}}
                                                <div class="form-group">
                                                  <label for="name">Full Name</label>
                                                  {{Form::text('name', $super->name, ['class' => 'form-control w-full', 'placeholder' => '$user->sname',])}}
                                                  @error('name')
                                                      <p class="text-red-500 text-xs italic mt-4">
                                                          {{ $message }}
                                                      </p>
                                                  @enderror
                                                </div>

                                                <div class="form-group">
                                                  <label for="email">Email address</label>
                                                   {{Form::text('email', $super->email, ['class' => 'form-control w-full', 'placeholder' => '$user->sname',])}}
                                                  @error('email')
                                                      <p class="text-red-500 text-xs italic mt-4">
                                                          {{ $message }}
                                                      </p>
                                                  @enderror
                                                </div>

                                                <div class="form-group">
                                                  <label for="mobile">Phone Number</label>
                                                   {{Form::number('mobile', $super->mobile, ['class' => 'form-control w-full', 'placeholder' => '$user->sname',])}}
                                                  @error('mobile')
                                                      <p class="text-red-500 text-xs italic mt-4">
                                                          {{ $message }}
                                                      </p>
                                                  @enderror
                                                </div>
                                              </div>
                                              <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                                              </div>
                                            </div>
                                            {!! Form::close() !!}
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <form role="form" method="POST" action="{{ route('preset') }}">
                                          @csrf
                                           {{Form::hidden('user_id', $super->id)}}                
                                            <button type="submit" class="btn btn-block btn-secondary">Password Reset</button>
                                          {!! Form::close() !!}
                                      </div>
                                      <div class="col-sm-4">
                                        <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-{{$super->id}}">Delete</button>
                                        <div class="modal fade" id="modal-{{$super->id}}">
                                          <div class="modal-dialog modal-sm">
                                            {!!Form::open(['action' => ['UserController@destroy', $super->id], 'method' => 'POST'])!!}
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Delete User</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  {{Form::hidden('_method', 'DELETE')}}
                                                  <p>Are you sure you want to delete this user: {{$super->name}} ? </p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  
                                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                </div>
                                              </div>
                                            {!! Form::close() !!}
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                 
                                  <!-- /.modal -->
                                </tr>
                              @endforeach
                            @endif
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Id</th>
                              <th>Full Name</th>
                              <th>Email Address</th>
                              <th>Phone Number</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="table2" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                            @if(count($admins) > 0)
                              @foreach($admins as $key=>$user)

                                <tr>
                                  <td>{{++$key}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->mobile}}</td>
                                  <td>
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-{{$user->mobile}}">edit</button>
                                        <div class="modal fade" id="modal-{{$user->mobile}}">
                                          <div class="modal-dialog modal-sm">
                                            {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Edit User</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  @csrf
                                                  {{Form::hidden('_method', 'PUT')}}
                                                  <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    {{Form::text('name', $user->name, ['class' => 'form-control w-full', 'placeholder' => '$user->sname',])}}
                                                    @error('name')
                                                        <p class="text-red-500 text-xs italic mt-4">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="email">Email address</label>
                                                     {{Form::text('email', $user->email, ['class' => 'form-control w-full', 'placeholder' => '$user->sname',])}}
                                                    @error('email')
                                                        <p class="text-red-500 text-xs italic mt-4">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="mobile">Phone Number</label>
                                                     {{Form::number('mobile', $user->mobile, ['class' => 'form-control w-full', 'placeholder' => '$user->sname',])}}
                                                    @error('mobile')
                                                        <p class="text-red-500 text-xs italic mt-4">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                  </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                                                </div>
                                              </div>
                                              {!! Form::close() !!}
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-{{$user->name}}">upgrade</button>
                                        <div class="modal fade" id="modal-{{$user->name}}">
                                          <div class="modal-dialog modal-sm">
                                            {!!Form::open(['action' => ['UserController@userUpgrade'], 'method' => 'POST'])!!}
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Upgrade User</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  {{Form::hidden('user_id', $user->id)}}
                                                  <p>Are you sure you want to upgrade this user to superadministrator?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  {{Form::submit('Upgrade', ['class' => 'btn btn-success'])}}
                                                </div>
                                              </div>
                                            {!! Form::close() !!}
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <form role="form" method="POST" action="{{ route('preset') }}">
                                          @csrf
                                           {{Form::hidden('user_id', $user->id)}}                
                                            <button type="submit" class="btn btn-block btn-secondary">Password Reset</button>
                                          {!! Form::close() !!}
                                      </div>
                                      <div class="col-sm-3">
                                        <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-{{$user->id}}">Delete</button>
                                        <div class="modal fade" id="modal-{{$user->id}}">
                                          <div class="modal-dialog modal-sm">
                                            {!!Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST'])!!}
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Delete User</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  {{Form::hidden('_method', 'DELETE')}}
                                                  <p>Are you sure you want to delete this user: {{$user->name}} ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  
                                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                </div>
                                              </div>
                                            {!! Form::close() !!}
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                      </div>
                                    </div>
                                  </td>  
                                </tr>
                              @endforeach
                            @endif
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Id</th>
                              <th>Full Name</th>
                              <th>Email Address</th>
                              <th>Phone Number</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
              <!-- /.card -->
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

