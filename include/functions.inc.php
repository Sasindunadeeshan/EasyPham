<?php

//SIGN UP LOGIN FUNCTION

function emptyInputsSignup($firstName, $lastName, $gender, $email, $password, $pwdrepeat, $phoneNmb, $address, $city, $province, $postalCode)
{
    $result; // Initialize the result variable
    
    if (empty($firstName) || empty($lastName) || empty($gender) || empty($email) || empty($password) || empty($pwdrepeat) || empty($phoneNmb) || empty($address) || empty($city) || empty($province) || empty($postalCode)) {
        $result = true; // Set the result to true if any of the fields are empty 
    } else {
        $result = false;
    }
    
    return $result; // Return the result
}

function invalidEmail($email)
{
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $pwdrepeat)
{
    $result;

    if ($password !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function uidExist($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function insertUser($conn, $firstName, $lastName, $gender, $email, $password, $phoneNmb, $address, $city, $province, $postalCode)
{
    $sql = "INSERT INTO users (firstName, lastName, gender, email, password, phoneNum, address, city, province, postalCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $firstName, $lastName, $gender, $email, $hashedPwd, $phoneNmb, $address, $city, $province, $postalCode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


//login function

function loginUser($conn, $email, $password) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        $pwdCheck = password_verify($password, $row['password']);
        if ($pwdCheck === false) {
            header("Location: ../php/login.php?error=wrongLogin");
            exit();
        } elseif ($pwdCheck === true) {
            return $row; // Return the entire user row
        }
    }

    header("Location: ../php/login.php?error=wrongLogin");
    exit();
}

function getUserRole($conn, $userId) {
    $sql = "SELECT role FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row['role'];
    }

    header("Location: ../php/login.php?error=wrongLogin");
    exit();
}
