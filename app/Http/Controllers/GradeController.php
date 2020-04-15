<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function getTotalSubject(Request $request){
        $totalSubject = $request->tot_subject;
        return view('store_subject',compact('totalSubject'));
    }

    public function addSubject(Request $request, $totSubject){
        $subject = array();
        $scores = array();
        $totGrade = 0;
        $failSub = false;
        for($i=1; $i<=$totSubject;$i++){

            $s = "sub".$i;
            $c = "score".$i;

            $subject[$i] = $request->$s;
            $scores[$i] = floatval($request->$c);

            //echo $request->$s." :".$request->$c;
            //echo "<br>";


        }

       
        echo "<h4>Result :</h4>";
        echo "<hr>";
        for($i=1; $i<=$totSubject;$i++){

            //calculate grade
            $score = $scores[$i];


            if (100 >= $score && $score >= 80) {
                $grade = 5.00;
            } else if (80 > $score && $score >= 70) {
                $grade = 4.00;
            } else if (70 > $score && $score >= 60) {
                $grade = 3.50;
            } else if (60 > $score && $score >= 50) {
                $grade = 3.00;
            } else if (50 > $score && $score >= 40) {
                $grade = 2.50;
            } else if (40 > $score && $score >= 33) {
                $grade = 2.00;
            } else if ($score < 33) {
                $grade = 0.00;
                $failSub = true;
            } else {
                echo "Invalid score";
            }

            $totGrade += $grade;

            echo $subject[$i]." : ". number_format((float)$grade,2,'.','');
            echo "<br>";


        }

        //print result


        if(!$failSub){
            echo ".......................................<br>";
            $result = $totGrade/$totSubject;
            echo "Grade : <b>GPA ".number_format((float)$result,2,'.','')."</b>";

        }
        else{
            echo ".......................................<br>";
            echo "Grade : <b>Failed</b> <br>";
        }
        

    }


}
