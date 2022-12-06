<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <td><h2>
@php $image_path = '/upload/easyschool.jpg'; @endphp
   <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>LASMS</h2>
<p>LASMS</p>
<p>Phone : 343434343434</p>
<p>Email : support@lasms.com</p>
<p> <b>Student Result Report </b> </p>

    </td>
  </tr>


</table>
 <br> <br>
 <strong>Result of : </strong> {{ $allData['0']['exam_type']['name'] }}
 <br> <br>
<table id="customers">

  <tr>
    <td width="50%"> <h4>Year / Session : </h4> {{ $allData['0']['year']['name'] }} </td>
    <td width="50%"> <h4> Class :  </h4>{{ $allData['0']['student_class']['name'] }} </td>
  </tr>




</table>

<table border="1" style="border-color: #ffffff; margin-bottom:20px;" width="100%" cellpadding="8" cellspacing="2">
  <thead>
    <tr>
      <th> Letter Grade </th>
      <th> Marks Interval </th>
      <th> Grade Point </th>
    </tr>
  </thead>
  <tbody>
    @foreach($allGrades as $mark)
    <tr>
<td>{{ $mark->grade_name }}</td>
<td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
<td>{{ number_format((float)$mark->grade_point,2) }} - {{ ($mark->grade_point == 5)?(number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td>
</tr>
    @endforeach
  </tbody>

</table>





@foreach($allData as $data)
@php

	$assign_student = App\Models\AssignStudent::where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('student_id',$data['student']['id'])->first();
     //dd($assign_student);

  @endphp
<table border="1" style="border-color: #ffffff; margin-bottom:20px;" width="100%" cellpadding="8" cellspacing="2">

<tr>
    <td width="50%">Student Id</td>
    <td width="50%">{{ $data['student']['id_no'] }}</td>
  </tr>

  <tr>
    <td width="50%">Roll No</td>
    <td width="50%">{{ $assign_student->roll }}</td>
  </tr>

  <tr>
    <td width="50%">Name </td>
    <td width="50%">{{ $data['student']['name'] }}</td>
  </tr>


  <tr>
    <td width="50%">Class</td>
    <td width="50%">{{ $data['student_class']['name'] }}</td>
  </tr>


  <tr>
    <td width="50%">Session</td>
    <td width="50%">{{ $data['year']['name']  }}</td>
  </tr>
  {{-- ------------------------------------------------ --}}



@php
$count=0;
@endphp



@php

  $total_marks = 0;
  $total_point = 0;

$get_mark = $data->marks;
$total_marks = (float)$total_marks+(float)$get_mark;
$total_subject = App\Models\StudentMarks::where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get()->count();

$grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
$grade_name = $grade_marks->grade_name;
$grade_point = number_format((float)$grade_marks->grade_point,2);
$total_point = (float)$total_point+(float)$grade_point;

  $total_grade = 0;
  $point_for_letter_grade = (float)$total_point/(float)$total_subject;

  $total_grade = App\Models\MarksGrade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
  // dd($total_grade);
  $grade_point_avg = (float)$total_point/(float)$total_subject;

  @endphp

<tr>
  <td width="50%"><strong>Grade Point Average</strong></td>
  <td width="50%">
    {{number_format((float)$grade_point_avg,2)}}
  </td>
</tr>

<tr>
  <td width="50%"><strong>Letter Grade </strong></td>
  <td width="50%">
    {{ $total_grade->grade_name}}
  </td>
</tr>
<tr>
  <td width="50%">Total Marks with Fraction</td>
  <td width="50%"><strong>{{ $total_marks }}</strong></td>
</tr>
<tr>
      <td style="text-align: left;"><strong>Remarks:</strong>
        {{ $total_grade->remarks }}
      </td>
    </tr>






      </table>

      @endforeach



<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">




</body>
</html>
