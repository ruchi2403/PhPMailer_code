<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        // $subject = $_POST['subject'];
        $description = $_POST['description'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ruchi.yadav@iphtechnologies.com"; //enter you email address
        $mail->Password = 'sfhvkvbynbqcdznb'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("hr@iphtechnologies.com"); //enter you email address
        $mail->Subject = ("$email ($subject)");
        $message = "<p>Name: $name</p><p>Email: $email</p><p>Description: $description</p>";
        $mail->Body = $message;




        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
           echo $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

       echo json_encode(array("status" => $status, "response" => $response));
    }
?>
