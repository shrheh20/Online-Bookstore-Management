<?php
include("connect.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
$name=$email=$subject=$comment="";
$name_err=$email_err=$subject_err=$comment_err="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM student WHERE Name= :name";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $name = trim($_POST["name"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
        if(empty(trim($_POST["email"]))){
        $email_err = "Please enter valid email id.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM comment WHERE Email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $email = trim($_POST["email"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    if(empty(trim($_POST["subject"]))){
        $subject_err = "Please enter a branch.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM comment WHERE Subject = :subject";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":subject", $param_subject, PDO::PARAM_STR);
            
            // Set parameters
            $param_subject = trim($_POST["subject"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $subject = trim($_POST["subject"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    if(empty(trim($_POST["comment"]))){
        $comment_err = "Please enter your comment.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM comment WHERE Comment = :comment";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":comment", $param_comment, PDO::PARAM_STR);
            
            // Set parameters
            $param_comment = trim($_POST["comment"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $comment = trim($_POST["comment"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($comment_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO comment (Name, Email, Subject, Comment) VALUES (:name,:email,:subject,:comment)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameter
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":subject", $param_subject, PDO::PARAM_STR);
            $stmt->bindParam(":comment", $param_comment, PDO::PARAM_STR);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_subject=$subject;
            $param_comment=$comment;
         
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                echo 'comment submitted';
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
}
?>