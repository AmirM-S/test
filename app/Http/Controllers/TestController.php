<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function createCourse(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $newCourse = Course::create($incomingFields);
        return $newCourse;
    }

    public function createLesson(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'courseName' => 'required',
            'price' => 'required|numeric'
        ]);
    
        $course = Course::where('name', $incomingFields['courseName'])->first();
    
        if (!$course) {
            return "Course not found";
        }
    
        $lesson = new Lesson();
        $lesson->name = $incomingFields['name'];
        $lesson->course_id = $course->id;
        $lesson->price = $incomingFields['price'];
        $lesson->save();
    
        $result = [
            'name' => $lesson->name,
            'price' => $lesson->price
        ];
    
        return $result;
    }

    public function updateCoursePrice(Request $request, Course $course)
    {
        $incomingFields = $request->validate([
            'price' => 'required|numeric'
        ]);
        $course->price = $incomingFields['price'];
        $course->save();

        return $course->price;
    }

    public function updateLessonPrice(Request $request, Lesson $lesson)
    {
        $incomingFields = $request->validate([
            'price' => 'required|numeric'
        ]);
        $lesson->price = $incomingFields['price'];
        $lesson->save();

        return $lesson;
    }

    public function showCourses()
    {
        return Course::with('lessons')->get();
    }

    public function showLessons()
    {
        return Lesson::all();
    }
}

