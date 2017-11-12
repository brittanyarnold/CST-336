<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}

include 'database.php';
$conn = getDatabaseConnection();

function getUserInfo() {
    global $conn;
    $sql = "SELECT * FROM user WHERE id=".$_GET['userId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($record);
    return $record;
}

if(isset($_GET['updateUser'])) { // checks whether admin has submitted form
    $sql = "UPDATE user
            SET firstName = :fName,
                lastName = :lName,
                email = :email,
                phone = :phone,
                role = :role,
                deptId = :deptId,
            WHERE id = :id";
            
    $np = array();
    $np[':fName'] = $_GET['firstName'];
    $np[':lName'] = $_GET['lastName'];
    $np[':email'] = $_GET['email'];
    $np[':phone'] = $_GET['phone'];
    $np[':role'] = $_GET['role'];
    $np[':deptId'] = $_GET['deptId'];
    $np[':id'] = $_GET['userId'];
    
    $stmt = $conn()->prepare($sql);
    $stmt->execute($np);
    echo "Record has been updated!";
}

if(isset($_GET['userId'])) {
    $userInfo = getUserInfo();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
    </head>
    <body>
        <h1>Update User</h1>
         <h1> Tech Checkout System: Updating User's Info </h1>
        <form method="GET">
            <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>" />
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>" />
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>" />
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>" />
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff" <?=(strtoupper($userInfo['role']) == strtoupper('staff'))?" selected":"" ?> >Staff</option>
                <option value="student" <?=(strtoupper($userInfo['role']) == strtoupper('student'))?" selected":"" ?> >Student</option>
                <option value="faculty" <?=(strtoupper($userInfo['role']) == strtoupper('faculty'))?" selected":"" ?> >Faculty</option>
            </select>
            <br />
            Department: 
            <select name="deptId">
                <option value="" > Select One </option>
                <option value="computer science" <?=(strtoupper($userInfo['deptId']) == strtoupper('computer science'))?" selected":""?> >Computer Science</option>
                <option value="statistics" <?=(strtoupper($userInfo['deptId']) == strtoupper('statistics'))?" selected":""?>>Statistics</option>
                <option value="design" <?=(strtoupper($userInfo['deptId']) == strtoupper('design'))?" selected":""?> >Design</option>
                <option value="economics" <?=(strtoupper($userInfo['deptId']) == strtoupper('economics'))?" selected":""?> >Economics</option>
                <option value="drama" <?=(strtoupper($userInfo['deptId']) == strtoupper('drama'))?" selected":""?> >Drama</option>
                <option value="biology" <?=(strtoupper($userInfo['deptId']) == strtoupper('biology'))?" selected":""?> >Biology</option>
            </select>
            <input type="submit" value="Update User" name="updateUser">
        </form>
    </body>
</html>