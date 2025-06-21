import argparse
from .models import Institute


def main():
    parser = argparse.ArgumentParser(description="Simple institute management CLI")
    parser.add_argument("name", help="Name of the institute")
    subparsers = parser.add_subparsers(dest="command", required=True)

    add_student = subparsers.add_parser("add-student", help="Add a new student")
    add_student.add_argument("student_id", type=int)
    add_student.add_argument("name")

    add_course = subparsers.add_parser("add-course", help="Add a new course")
    add_course.add_argument("course_id", type=int)
    add_course.add_argument("title")

    enroll = subparsers.add_parser("enroll", help="Enroll a student in a course")
    enroll.add_argument("student_id", type=int)
    enroll.add_argument("course_id", type=int)

    args = parser.parse_args()
    institute = Institute(args.name)

    if args.command == "add-student":
        institute.add_student(args.student_id, args.name)
        print(f"Added student {args.name} ({args.student_id})")
    elif args.command == "add-course":
        institute.add_course(args.course_id, args.title)
        print(f"Added course {args.title} ({args.course_id})")
    elif args.command == "enroll":
        institute.enroll_student(args.student_id, args.course_id)
        print(f"Enrolled student {args.student_id} in course {args.course_id}")

if __name__ == "__main__":
    main()
