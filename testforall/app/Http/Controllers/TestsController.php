<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    //
    public function getTestQuestions(){

    $questions = DB::table('tests')->get();
    return view('test',['questions'=>$questions]);


    }

    public function submitExam(Request $request){

   $answers = $request->all();
   // dd($answers);
   $points = 0;
   $percentage = 0;
   $totalQuestions = 2;

   foreach($answers as $questionId => $userAnswer){

   if(is_numeric($questionId)){
    $questionInfo = DB::table('tests')->where('id',$questionId)->get();
      $correctAnswer = $questionInfo[0]->correct_answer;

      if($correctAnswer = $userAnswer){
       $points++;
      }
   }


   }

   $percentage = ($points/$totalQuestions)*100;

   //dd($percentage);
   DB::table('results')->insert([
       'user_id'=>1,
       'score'=>$percentage
   ]);

   return redirect()->route('main')->with('examSubmitted','The exam has been submitted successfully,check your profile for the result later');

    }


}
