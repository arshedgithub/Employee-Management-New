<?php

require_once("db.php");
require_once("employee.php");
require_once("genderdao.php");


    class EmployeeDao{

        public static function getById($id){

            $employee = new Employee();

            $sql = "SELECT * FROM employee WHERE id =$id";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);
            $row = $result->fetch_assoc();
            
            $employee->setId($row['id']);
            $employee->setName($row['name']);
            $employee->setAge($row['age']);
            $employee->setGender(GenderDao::getById($row['gender_id']));

            return $employee;

        }

        public static function getAll(){

            $employees = array();

            $sql = "SELECT * FROM employee";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);

            while($row = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($row['id']);
                $employee->setName($row['name']);
                $employee->setAge($row['age']);
                $employee->setGender(GenderDao::getById($row['gender_id']));

                array_push($employees,$employee);
            }
            return $employees;
        }

        public static function getAllByName($name){

            $employees = array();

            $sql = "SELECT * FROM employee WHERE name LIKE '$name%'";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);

            while($row = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($row['id']);
                $employee->setName($row['name']);
                $employee->setAge($row['age']);
                $employee->setGender(GenderDao::getById($row['gender_id']));

                array_push($employees,$employee);
            }
            return $employees;
        }

        public static function getAllByGender($gender){

            $employees = array();

            $sql = "SELECT * FROM employee WHERE gender_id = '$gender'";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);

            while($row = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($row['id']);
                $employee->setName($row['name']);
                $employee->setAge($row['age']);
                $employee->setGender(GenderDao::getById($row['gender_id']));

                array_push($employees,$employee);
            }
            return $employees;
        }

        public static function getAllByNameAndGender($name, $gender){

            $employees = array();

            $sql = "SELECT * FROM employee WHERE name LIKE '$name%' and gender_id = $gender";
            $dbconn = CommonDao::getConnection();
            $result = $dbconn->query($sql);

            while($row = $result->fetch_assoc()){

                $employee = new Employee();

                $employee->setId($row['id']);
                $employee->setName($row['name']);
                $employee->setAge($row['age']);
                $employee->setGender(GenderDao::getById($row['gender_id']));

                array_push($employees,$employee);
            }
            return $employees;
        }
        public static function save($employee){

            $sql = "INSERT INTO employee (name, age, gender_id) VALUES ('".$employee->name."','".$employee->age."',".$employee->gender->id.")";
            echo($sql);
            $dbconn = CommonDao::getConnection();
             $dbconn->query($sql);
        }

    }

?>