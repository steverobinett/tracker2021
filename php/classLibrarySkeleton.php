<?php

class User {
    public $email;
    private $first;
    public $last;
    public $role;
    
    public function __construct($email, $first, $last, $role) {
        $this->email = $email;
        $this->first = $first;
        $this->last = $last;
        $this->role = $role;
    }
}

class Textbook {
    public $isbn;
    public $title;
    public $author;
    public $edition;
    public $publisher;
    public $format;

    public function __construct($isbn, $title, $author, $edition, $publisher, $format) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->edition = $edition;
        $this->publisher = $publisher;
        $this->format = $format;
    }
}

class Course {
    public $prefix;
    public $number;
    public $section;
    public $term;
    public $enrollment;
    public $dept;
    public $faculty;
    public $required;
    public $usenew;

    public function __construct($prefix; $number; $section; $term; $enrollment; $dept; $faculty; $required; $usenew) {
        $this->prefix = $prefix;
        $this->number = $number;
        $this->section = $section;
        $this->term = $term;
        $this->enrollment = $enrollment;
        $this->dept = $dept;
        $this->faculty = $faculty;
        $this->required = $required;
        $this->usenew = $usenew;
    }
}

class Coursetextbook {
    public $id;
    public $isbn;
    public $prefix;
    public $number;
    public $section;
    public $term;

    public function __construct($id, $isbn, $prefix, $number, $section, $term) {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->prefix = $prefix;
        $this->number = $number;
        $this->section = $section;
        $this->term = $term;
    }
}

class Term {
    public $year;
    public $semester;

    public function __construct($year, $semester) {
        $this->year = $year;
        $this->semester = $semester;
    }
}

class Department {
    public $dept;

    public function __construct($dept) {
        $this->dept = $dept;
    }
}

class Faculty {
    public $first;
    public $last;

    public function __construct($first, $last) {
        $this->first = $first;
        $this->last = $last;
    }
}

?>