<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = auth()->user()->questionnaires;

        return view("questionnaire.questionnaire", ["questionnaires" => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = "questionnaire.create";
        return view($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required",
            "purpose" => "required"
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect("/questionnaires/" . $questionnaire->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire = Questionnaire::where("user_id", auth()->user()->id)
            ->where("id", $questionnaire->id)
            ->first();

        if (!$questionnaire) {
            return redirect("/questionnaires");
        }

        $questionnaire->load('questions.answers.responses');

        return view("questionnaire.show", ["questionnaire" => $questionnaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
