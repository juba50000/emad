import unittest
from institute.models import Institute

class TestInstitute(unittest.TestCase):
    def setUp(self):
        self.inst = Institute("Test Institute")

    def test_add_student_and_course(self):
        student = self.inst.add_student(1, "Alice")
        course = self.inst.add_course(100, "Math")
        self.assertEqual(student.name, "Alice")
        self.assertEqual(course.title, "Math")

    def test_enroll(self):
        self.inst.add_student(1, "Alice")
        self.inst.add_course(100, "Math")
        self.inst.enroll_student(1, 100)
        student = self.inst.students[1]
        course = self.inst.courses[100]
        self.assertIn(course, student.courses)
        self.assertIn(student, course.students)

if __name__ == '__main__':
    unittest.main()
