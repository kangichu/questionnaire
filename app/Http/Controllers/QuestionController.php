<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        //return redirect('/questionnaires/'.$questionnaire->id);
        return redirect('/questionnaires/view')->with("success","Your Questionnaire has been created successfully.");
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect()->back()->with("success","Your question has been deleted successfully.");
    }
}
