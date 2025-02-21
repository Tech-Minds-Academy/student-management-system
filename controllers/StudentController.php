<?php
include '../config/database.php';
include '../models/Student.php';

class StudentController {
    private $student;

    public function __construct($db) {
        $this->student = new Student($db);
    }

    public function create($first_name, $last_name, $email) {
        $this->student->first_name = $first_name;
        $this->student->last_name = $last_name;
        $this->student->email = $email;

        if ($this->student->create()) {
            return "Student created successfully!";
        } else {
            return "Error creating student.";
        }
    }

    public function read() {
        return $this->student->read();
    }

    public function read_single($id) {
        $this->student->id = $id;
        return $this->student->read_single();
    }

    public function update($id, $first_name, $last_name, $email) {
        $this->student->id = $id;
        $this->student->first_name = $first_name;
        $this->student->last_name = $last_name;
        $this->student->email = $email;

        if ($this->student->update()) {
            return "Student updated successfully!";
        } else {
            return "Error updating student.";
        }
    }

    public function delete($id) {
        $this->student->id = $id;

        if ($this->student->delete()) {
            return "Student deleted successfully!";
        } else {
            return "Error deleting student.";
        }
    }
}
?>