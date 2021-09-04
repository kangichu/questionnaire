<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Answer;
use Auth;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id = auth()->user()->id;

        $questionnaires = Questionnaire::where('user_id', $user_id)->get();
       
        if ((Auth::user()->password_change_at == null)) {
            return redirect(route('passForm'));
        }
        else{
            return view('questionnaire.index')->with(array('questionnaires' => $questionnaires)); 
        }
       
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/view')->with("success","Your Questionnaire has been created successfully.");
    }

    public function show()
    {

        $user_id = auth()->user()->id;
        $questions =  DB::table('questions')
        ->join('questionnaires', 'questionnaires.id', '=', 'questions.questionnaire_id')
        ->select('questionnaires.*', 'questions.*')
        ->where('questionnaires.user_id', $user_id)
        ->get();


        return view('question.show')->with(array('questions'=>$questions));
    }

    public function destroy(Request $request)
    {
        $questionnaire_id = $request->input('id');
        $questionnaire = Questionnaire::where('id', $questionnaire_id)->first();
        $question = Question::where('questionnaire_id', $questionnaire->id)->get();
        

        if(Auth::user()->hasRole('superadministrator')){ 
            foreach($question as $record) 
            {
                $ansers = Answer::where('question_id', $record->id)->get();
                $ansers->delete();
            }

            foreach($question as $record) 
            {
                $question->delete();
            }
            
            
            $questionnaire->delete();  
            return back();
        } else { 
            return back();
        }
       
    }


    public function activate($id)
    {
        Questionnaire::where('id', $id)->update(['status'=> 1]);
        return redirect('/questionnaires/view')->with("success","Your Questionnaire has been activated successfully.");
    }


    public function deactivate($id)
    {
        Questionnaire::where('id', $id)->update(['status'=> 0]);
        return redirect('/questionnaires/view')->with("success","Your Questionnaire has been deactivated successfully.");
    }



}
