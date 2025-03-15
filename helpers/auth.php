<?php
require_once '../includes/db.php';
function generateHostID()
{
    return "SPH" . rand(1000, 9999);
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
} else if (isset($_POST['signup_worker'])) {

    $host_id = $_POST['host_id'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $device_id = $_POST['device_id'];

    $sql = "INSERT INTO workers (host_id, name, password, device_id, created_at) 
            VALUES (:host_id, :name, :password, :device_id, NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':host_id', $host_id);
    $stmt->bindParam(':name', $name); // Fixed incorrect placeholder
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':device_id', $device_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Host registered successfully!');
                window.location.href = '../index.php';
              </script>";
        exit; // Ensures script stops execution
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../index.php';
                });
              </script>";
        exit;
    }
} else if (isset($_POST['signin_worker'])) {

    $device_id = $_POST['device_id'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM workers WHERE device_id = :device_id");
    $stmt->bindParam(':device_id', $device_id);
    $stmt->execute();
    $worker = $stmt->fetch();

    if ($worker) {
        if (password_verify($password, $worker['password'])) {
            session_start();

            $_SESSION['worker_id'] = $worker['id'];
            $_SESSION['device_id'] = $worker['device_id'];
            $_SESSION['worker_name'] = $worker['name']; // Added for consistency

            header("Location: ../worker/index.php");
            exit;
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Invalid password!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '../index.php';
                    });
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Worker not found!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../index.php';
                });
              </script>";
        exit;
    }
}
