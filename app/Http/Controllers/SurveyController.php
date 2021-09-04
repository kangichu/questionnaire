<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Auth;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{

    public function index()
    {
        $questionnaires = Questionnaire::where('status', 1)->get();
        return view('survey.index')->with(array('questionnaires' => $questionnaires)); 
    }

    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.mobile' => 'required',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->surveyresponse()->createMany($data['responses']);

        return redirect('/')->with("success","Thank you for your time!");
    }

    public function answers()
    {
        $user_id = auth()->user()->id;

        $questionnaires = Questionnaire::where('user_id', $user_id)->get();

        $answers = DB::table('survey_responses')
        ->join('surveys', 'survey_responses.survey_id' , '=','surveys.id')
        ->join('answers', 'survey_responses.answer_id' , '=','answers.id')
        ->join('questions','survey_responses.question_id', '=', 'questions.id')
        ->join('questionnaires',  'questions.questionnaire_id' , '=','questionnaires.id')
        ->where('questionnaires.user_id', $user_id )
        ->select('survey_responses.*','surveys.*','answers.*','questions.*','questionnaires.*')
        ->get();

        return view('answers.index')->with(array('answers' => $answers)); 
    }
}
