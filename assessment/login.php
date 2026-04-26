<?php
session_start();

$usernameErr = $passwordErr = "";
$username = $password = "";
$msg = "";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Demo stored users (no database)
if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [
        [
            "username" => "admin",
            "password" => password_hash("admin1234", PASSWORD_DEFAULT),
            "role" => "admin"
        ]
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = cleanInput($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($usernameErr == "" && $passwordErr == "") {

        $found = false;

        foreach ($_SESSION["users"] as $user) {

            if ($user["username"] == $username &&
                password_verify($password, $user["password"])) {

                $found = true;
                $_SESSION["role"] = $user["role"];

                if ($user["role"] == "admin") {
                    header("Location: admin.php");
                } else {
                    header("Location: librarian.php");
                }
                exit();
            }
        }

        if (!$found) {
            $msg = "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #f8fafc);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }

        input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79,70,229,0.2);
        }

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
            display: block;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }

        .message {
            text-align: center;
            color: red;
            margin-top: 10px;
            font-weight: bold;
        }

        .signup-text {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="login-card">

<h2>Login</h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label>Username *</label>
    <input type="text" name="username" value="<?php echo $username; ?>">
    <span class="error"><?php echo $usernameErr; ?></span>

    <label>Password *</label>
    <input type="password" name="password">
    <span class="error"><?php echo $passwordErr; ?></span>

    <button type="submit">Login</button>

</form>

<p class="message"><?php echo $msg; ?></p>

<p class="signup-text">
    Don't have an account? <a href="signup.php">Signup</a>
</p>

</div>

<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>
</html>