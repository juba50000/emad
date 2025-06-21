<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../php/Institute.php';

class InstituteTest extends TestCase
{
    public function testEnrollStudent()
    {
        $inst = new Institute();
        $inst->addStudent('S1', 'Alice');
        $inst->addCourse('C1', 'Math');
        $inst->enrollStudent('S1', 'C1');
        $student = $inst->getStudents()[0];
        $course = $inst->getCourses()[0];
        $this->assertCount(1, $student->getCourses());
        $this->assertCount(1, $course->getStudents());
    }
}
