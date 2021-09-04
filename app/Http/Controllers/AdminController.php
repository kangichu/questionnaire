<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Questionnaire;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {

        $user_id = auth()->user()->id;

       
        $questionnaires = Questionnaire::where('user_id', $user_id)->get();
        $questionnairesCount = Questionnaire::where('user_id', $user_id)->count();

        $answers = DB::table('survey_responses')
        ->join('surveys', 'survey_responses.survey_id' , '=','surveys.id')
        ->join('answers', 'survey_responses.answer_id' , '=','answers.id')
        ->join('questions','survey_responses.question_id', '=', 'questions.id')
        ->join('questionnaires',  'questions.questionnaire_id' , '=','questionnaires.id')
        ->where('questionnaires.user_id', $user_id )
        ->select('questions.question', DB::raw('count(survey_responses.id)  as occurences'))
        ->groupBy('questions.question')
        ->get();

        if ((Auth::user()->password_change_at == null)) {
            return redirect(route('passForm'));
        }
        else{
            return view('admin.index')->with(array('questionnaires' => $questionnaires, 'answers' => $answers, 'questionnairesCount' => $questionnairesCount)); 
        }
       
    }
}
