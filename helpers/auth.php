<?php
require_once '../includes/db.php';
function generateHostID()
{
    return "SP" . rand(1000, 9999);
}

if (isset($_POST['signup_host'])) {
    $host_id = generateHostID();
    $name = $_POST['hostname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phoneno = $_POST['phoneno'];

    $sql = "INSERT INTO hosts (host_id, hostname, password, phone_no, created_at) VALUES (:host_id, :hostname, :password, :phoneno, NOW())";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':host_id', $host_id);
    $stmt->bindParam(':hostname', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phoneno', $phoneno);

    if ($stmt->execute()) {
        echo "<script>
                alert('Host registered successfully!');
                window.location.href = '../index.php';
              </script>";
        header("Location: ../index.php");
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
        header("Location: ../index.php");
    }
} else if (isset($_POST['signin_host'])) {
    $hostname = $_POST['hostname'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM hosts WHERE hostname = :hostname");
    $stmt->bindParam(':hostname', $hostname);
    $stmt->execute();
    $host = $stmt->fetch();

    if ($host) {
        if (password_verify($password, $host['password'])) {
            session_start();
            $_SESSION['host_id'] = $host['host_id'];
            $_SESSION['hostname'] = $host['hostname'];
            $_SESSION['phone_no'] = $host['phone_no'];
            header("Location: ../host/index.php");
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Invalid password!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                  </script>";
            header("Location: ../index.php");
        }
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Host not found!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
        header("Location: ../index.php");
    }
}
