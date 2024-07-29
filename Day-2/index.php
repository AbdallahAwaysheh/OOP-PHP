<?php
class Student
{
    private $name;
    private $age;
    private $studentID;

    public function __construct($name = null, $age = null, $studentID = null)
    {
        $this->name = $name;
        $this->age = $age;
        $this->studentID = $studentID;
    }
    public function __destruct()
    {
        echo "Student object is destroyed";
        exit;
    }
    public function getDetails()
    {
        return "
                student name : $this->name 
                <br>
                student age : $this->age
                <br>
                student ID : $this->studentID
                <br>
        ";
    }
    //setters 
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setID($studentID)
    {
        $this->studentID = $studentID;
    }
    //getters 
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getID()
    {
        return $this->studentID;
    }
}
class Classroom
{
    public $students = [];

    public function addStudent(Student $student)
    {
        $this->students[$student->getID()] = $student;
    }
    public function removeStudent($studentID)
    {
        unset($this->students[$studentID]);
    }
    public function listStudents()
    {
        $counter = 1;
        echo "<div class='student'>";
        echo "<ul>";
        foreach ($this->students as $student) {


            echo "<li>";
            echo " $counter - " . "<br>" . $student->getDetails();
            echo "</li>";
            $counter++;
        }
        echo "</ul>";
        echo "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            align-items: center;
            height: 100vh;
        }

        .student {
            background-color: blue;
            color: white;
            width: 200px;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <?php
    $student1 = new Student("Abdallah", 30, 201820123);
    $student2 = new Student("ahmad", 15, 20182983);
    $student3 = new Student("Abdallah", 20, 201827823);

    $classRoom1 = new Classroom();
    $classRoom1->addStudent($student1);
    $classRoom1->addStudent($student2);
    $classRoom1->addStudent($student3);
    $classRoom1->listStudents();
    ?>
</body>

</html>