?php
$firstname = $_POST['firstname'];
$middlename= $_POST['middlename'];
$lastname= $_POST['lastname'];
$semester = $_POST['semester'];
$course = $_POST['course'];
$rollno = $_POST['rollno'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$correctpassword = $_POST['repassword'];


//database connection
$conn=new mysqli('localhost', 'root', '', 'registration');
if($conn->connect_error){
    die('Connection Failed:'$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into registration(firstname, middlename, lastname, semester,course, rollno, gender, phone, address, email, password, correctpassword )
    values(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssisssissss",$firstname, $middlename, $lastname, $semester,$course, $rollno, $gender, $phone, $address, $email, $password, $correctpassword)
    $ssmt->execute();
    echo "registration successfully...";
    $stmt->close();
    $conn->close();
}