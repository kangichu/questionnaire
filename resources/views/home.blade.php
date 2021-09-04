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
             @include('stats.stats')
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Products Sold</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Entries</th>
                      </tr>
                      </thead>
                      <tbody>
                        
                          @if(count($productSold) > 0)
                            @foreach($productSold as $key=>$product)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$product->product}}</td>
                                <td>{{$product->prodCount}}</td>
                              </tr>
                            @endforeach
                          @endif
                        
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Entries</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Daily Entries</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="table2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Date</th>
                        <th>Entries</th>
                      </tr>
                      </thead>
                      <tbody>
                        
                          @foreach($dates as $date => $count)
                            <tr>
                              <td>{{$date}}</td>
                              <td>{{$count}}</td>
                            </tr>
                          @endforeach
                        
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Date</th>
                        <th>Entries</th>
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

            <div class="row">
              <div class="col-md-12">
                <!-- Bar chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Customers Per Shop
                    </h3>

                    {{-- <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div> --}}
                  </div>
                  <div class="card-body">
                    <div id="barchart_material" style="width: 100%; height: 500px;"></div>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-12">
                <!-- Bar chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Customers Per Shop
                    </h3>

                    {{-- <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div> --}}
                  </div>
                  <div class="card-body">
                    <div id="barchart_material2" style="width: 100%; height: 500px;"></div>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->
              </div>
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

