#!/usr/bin/env php
<?php
require_once __DIR__ . '/Institute.php';

function usage()
{
    echo "Usage:\n";
    echo "  php cli.php add-student <id> <name>\n";
    echo "  php cli.php add-course <id> <title>\n";
    echo "  php cli.php enroll <studentId> <courseId>\n";
    exit(1);
}

$argc = $_SERVER['argc'];
$argv = $_SERVER['argv'];

if ($argc < 2) {
    usage();
}

$command = $argv[1];
$institute = new Institute();

switch ($command) {
    case 'add-student':
        if ($argc < 4) usage();
        $studentId = $argv[2];
        $name = $argv[3];
        $institute->addStudent($studentId, $name);
        echo "Added student $name ($studentId)\n";
        break;
    case 'add-course':
        if ($argc < 4) usage();
        $courseId = $argv[2];
        $title = $argv[3];
        $institute->addCourse($courseId, $title);
        echo "Added course $title ($courseId)\n";
        break;
    case 'enroll':
        if ($argc < 4) usage();
        $studentId = $argv[2];
        $courseId = $argv[3];
        try {
            $institute->enrollStudent($studentId, $courseId);
            echo "Enrolled student $studentId in course $courseId\n";
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
            exit(1);
        }
        break;
    default:
        usage();
}
?>
