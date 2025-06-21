<?php

class Student {
    private $studentId;
    private $name;
    private $courses = [];

    public function __construct(string $studentId, string $name)
    {
        $this->studentId = $studentId;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->studentId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function enroll(Course $course): void
    {
        $this->courses[$course->getId()] = $course;
    }

    /**
     * @return Course[]
     */
    public function getCourses(): array
    {
        return array_values($this->courses);
    }
}

class Course {
    private $courseId;
    private $title;
    private $students = [];

    public function __construct(string $courseId, string $title)
    {
        $this->courseId = $courseId;
        $this->title = $title;
    }

    public function getId(): string
    {
        return $this->courseId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function addStudent(Student $student): void
    {
        $this->students[$student->getId()] = $student;
    }

    /**
     * @return Student[]
     */
    public function getStudents(): array
    {
        return array_values($this->students);
    }
}

class Institute {
    private $students = [];
    private $courses = [];

    public function addStudent(string $studentId, string $name): Student
    {
        if (!isset($this->students[$studentId])) {
            $this->students[$studentId] = new Student($studentId, $name);
        }
        return $this->students[$studentId];
    }

    public function addCourse(string $courseId, string $title): Course
    {
        if (!isset($this->courses[$courseId])) {
            $this->courses[$courseId] = new Course($courseId, $title);
        }
        return $this->courses[$courseId];
    }

    public function enrollStudent(string $studentId, string $courseId): void
    {
        if (!isset($this->students[$studentId])) {
            throw new Exception("Student $studentId not found");
        }
        if (!isset($this->courses[$courseId])) {
            throw new Exception("Course $courseId not found");
        }
        $student = $this->students[$studentId];
        $course = $this->courses[$courseId];
        $student->enroll($course);
        $course->addStudent($student);
    }

    /**
     * @return Student[]
     */
    public function getStudents(): array
    {
        return array_values($this->students);
    }

    /**
     * @return Course[]
     */
    public function getCourses(): array
    {
        return array_values($this->courses);
    }
}

?>
