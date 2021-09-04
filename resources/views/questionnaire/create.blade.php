@extends('layouts.dashboard')

@section('content')
<!-- Navbar -->
@include('topnav.topnav')
<!-- /.navbar -->
@include('sidenav.sidenav')
<!-- Main Sidebar Container -->
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Questionnaire</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">Create Questionnaire</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create New Questionnaire</div>

                        <div class="card-body">
                            <form action="/questionnaires" method="post" class="submit">

                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                                    <small id="titleHelp" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>

                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="purpose">Purpose</label>
                                    <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter Purpose">
                                    <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase responses.</small>

                                    @error('purpose')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Create Questionnaire</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 <!-- /.control-sidebar -->
@include('footer.footer')
<!-- Main Footer -->
@endsection
