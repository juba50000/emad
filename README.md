# Institute Management System

This repository provides a simple example of an educational institute management system implemented in Python.

## Features
- Add students and courses
- Enroll students in courses
- Command-line interface for basic operations

## Running Tests
Execute the unit tests with:

```bash
python3 -m unittest discover tests
```

## Using the CLI
Example usage:

```bash
python3 -m institute.cli MyInstitute add-student 1 Alice
python3 -m institute.cli MyInstitute add-course 100 Math
python3 -m institute.cli MyInstitute enroll 1 100
```
