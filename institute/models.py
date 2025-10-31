class Student:
    """Represents a student in the institute."""
    def __init__(self, student_id: int, name: str):
        self.student_id = student_id
        self.name = name
        self.courses = []  # list of Course objects

    def enroll(self, course: "Course") -> None:
        if course not in self.courses:
            self.courses.append(course)
            course.students.append(self)

class Course:
    """Represents a course offered by the institute."""
    def __init__(self, course_id: int, title: str):
        self.course_id = course_id
        self.title = title
        self.students = []  # list of Student objects

class Institute:
    """Simple in-memory management for students and courses."""
    def __init__(self, name: str):
        self.name = name
        self.students = {}
        self.courses = {}

    def add_student(self, student_id: int, name: str) -> Student:
        if student_id in self.students:
            raise ValueError("Student ID already exists")
        student = Student(student_id, name)
        self.students[student_id] = student
        return student

    def add_course(self, course_id: int, title: str) -> Course:
        if course_id in self.courses:
            raise ValueError("Course ID already exists")
        course = Course(course_id, title)
        self.courses[course_id] = course
        return course

    def enroll_student(self, student_id: int, course_id: int) -> None:
        if student_id not in self.students:
            raise KeyError("Student not found")
        if course_id not in self.courses:
            raise KeyError("Course not found")
        student = self.students[student_id]
        course = self.courses[course_id]
        student.enroll(course)

