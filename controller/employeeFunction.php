<?php

    function addEmployee($user_id, $emp_fname, $emp_lname, $emp_gender, $position, $status) {
        $db = db();
        $sql = "INSERT INTO employees(user_id, emp_fname, emp_lname, emp_gender, position, status) VALUES (?,?,?,?,?,?)";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($user_id, $emp_fname, $emp_lname, $emp_gender, $position, $status));
        $db = null;

        return "Employee Created";
    }

    if(isset($_POST['addEmployee'])) {
        $user_id = $_POST['user_id'];
        $emp_fname = $_POST['emp_fname'];
        $emp_lname = $_POST['emp_lname'];
        $emp_gender = $_POST['emp_gender'];
        $position = $_POST['position'];
        $status = "Active";

        if(!empty($emp_fname) && !empty($emp_lname) && !empty($emp_gender) && !empty($position)) {
            $empSuccess = addEmployee($user_id, $emp_fname, $emp_lname, $emp_gender, $position, $status);
        } else {
            $empError = "Failed to register";
        }
    }

    function employeeList($session_id) {
        $db = db();
        $sql = "SELECT * FROM employees WHERE user_id = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($session_id));
        $row = $cmd->fetchAll();
        $db = null;

        return $row;
    }

    function employeeCount($session_id) {
        $db = db();
        $sql = "SELECT COUNT(emp_id) FROM employees WHERE user_id = ?";
        $cmd = $db->prepare($sql);
        $cmd->execute(array($session_id));
        $row = $cmd->fetch();
        $db = null;

        return $row;
    }

    foreach(employeeCount($_SESSION['id']) as $rows_count) {
        $emp_count = $rows_count;
    }
?>