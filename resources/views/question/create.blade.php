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
                <h1 class="m-0 text-dark">Create Question</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">Create Question</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">Create New Question</div>

                        <div class="card-body"> 
                            <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post" class="submit">

                                @csrf

                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input name="question[question]" type="text" class="form-control"
                                           value="{{ old('question.question') }}"
                                           id="question" aria-describedby="questionHelp" placeholder="Enter Question">
                                    <small id="questionHelp" class="form-text text-muted">Ask simple and to-the-point questions for best results.</small>

                                    @error('question.question')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <fieldset>
                                        <legend>Choices</legend>
                                        <small id="choicesHelp" class="form-text text-muted">Give choices that give you the most insight into your question.</small>

                                        <div>
                                            <div class="form-group">
                                                <label for="answer1">Choice 1</label>
                                                <input name="answers[][answer]" type="text"
                                                       value="{{ old('answers.0.answer') }}"
                                                       class="form-control" id="answer1" aria-describedby="choicesHelp" placeholder="Enter Choice 1">

                                                @error('answers.0.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <div class="form-group">
                                                <label for="answer2">Choice 2</label>
                                                <input name="answers[][answer]" type="text"
                                                       value="{{ old('answers.1.answer') }}"
                                                       class="form-control" id="answer2" aria-describedby="choicesHelp" placeholder="Enter Choice 2">

                                                @error('answers.1.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <div class="form-group">
                                                <label for="answer3">Choice 3</label>
                                                <input name="answers[][answer]" type="text"
                                                       value="{{ old('answers.2.answer') }}"
                                                       class="form-control" id="answer3" aria-describedby="choicesHelp" placeholder="Enter Choice 3">

                                                @error('answers.2.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <div class="form-group">
                                                <label for="answer4">Choice 4</label>
                                                <input name="answers[][answer]" type="text"
                                                       value="{{ old('answers.3.answer') }}"
                                                       class="form-control" id="answer4" aria-describedby="choicesHelp" placeholder="Enter Choice 4">

                                                @error('answers.3.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>

                                <button type="submit" class="btn btn-primary">Add Question</button>

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
