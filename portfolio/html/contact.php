<?php
$fnameErr = $lnameErr = $emailErr = $genderErr = $reasonErr = "";
$firstname = $lastname = $email = $gender = $company = $reason = "";

function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // First Name
    if (empty($_POST["firstname"])) {
        $fnameErr = "First name is required";
    } else {
        $firstname = cleanInput($_POST["firstname"]);
    }

    // Last Name
    if (empty($_POST["lastname"])) {
        $lnameErr = "Last name is required";
    } else {
        $lastname = cleanInput($_POST["lastname"]);
    }

// Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = cleanInput($_POST["gender"]);
    }
}

    // Company (optional)
    $company = cleanInput($_POST["company"] ?? "");

    // Reason
    if (empty($_POST["reason"])) {
        $reasonErr = "Reason is required";
    } else {
        $reason = cleanInput($_POST["reason"]);
    }

?>

<!DOCTYPE html>
<html>

<head>
    <style>

        body {
            font-family: Arial;
            margin: 30px;
        }

        .form-table {
            border-collapse: collapse;
            width: 600px;
        }

        .form-table td {
            padding: 8px 10px;
            vertical-align: top;
        }

        .form-table td:first-child {
            width: 160px;
            font-weight: bold;
            text-align: right;
        }

        .form-table input[type="text"],
        .form-table input[type="email"],
        .form-table select {
            width: 280px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .error {
            color: red;
            font-size: 13px;
            display: block;
        }

        .required {
            color: red;
        }

        .form-table input[type="submit"] {
            padding: 7px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .result-table {
            border-collapse: collapse;
            width: 500px;
            margin-top: 10px;
        }

        .result-table td {
            padding: 7px 12px;
            border: 1px solid #ddd;
        }

        .result-table td:first-child {
            font-weight: bold;
            background: #f2f2f2;
            width: 160px;
        }

   </style>
</head>

<body>

    <h2>Contact Form</h2>
    <p><span class="required">* required field</span></p>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <table class="form-table">

            <tr>
                <td>First Name <span class="required">*</span></td>
                <td>
                    <input type="text" name="firstname" value="<?= $firstname ?>">
                    <span class="error"><?= $fnameErr ?></span>
                </td>
            </tr>

            <tr>
                <td>Last Name <span class="required">*</span></td>
                <td>
                    <input type="text" name="lastname" value="<?= $lastname ?>">
                    <span class="error"><?= $lnameErr ?></span>
                </td>
            </tr>

            <tr>
                <td>Gender <span class="required">*</span></td>
                <td>
                    <input type="radio" name="gender" value="Male" <?= ($gender == "Male") ? "checked" : "" ?>> Male
                    <input type="radio" name="gender" value="Female" <?= ($gender == "Female") ? "checked" : "" ?>> Female
                    <input type="radio" name="gender" value="Other" <?= ($gender == "Other") ? "checked" : "" ?>> Other
                    <span class="error"><?= $genderErr ?></span>
                </td>
            </tr>

            <tr>
                <td>Email <span class="required">*</span></td>
                <td>
                    <input type="email" name="email" value="<?= $email ?>">
                    <span class="error"><?= $emailErr ?></span>
                </td>
            </tr>

            <tr>
                <td>Company</td>
                <td>
                    <input type="text" name="company" value="<?= $company ?>">
                </td>
            </tr>

            <tr>
                <td>Reason of Contact <span class="required">*</span></td>
                <td>
                    <select name="reason">
                        <option value="">Select</option>
                        <option value="Projects" <?= ($reason == "Projects") ? "selected" : "" ?>>Projects</option>
                        <option value="Thesis" <?= ($reason == "Thesis") ? "selected" : "" ?>>Thesis</option>
                        <option value="Job" <?= ($reason == "Job") ? "selected" : "" ?>>Job</option>
                    </select>
                    <span class="error"><?= $reasonErr ?></span>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                </td>
            </tr>

        </table>

    </form>


<?php
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    !$fnameErr &&
    !$lnameErr &&
    !$emailErr &&
    !$genderErr &&
    !$reasonErr
):
?>

    <h3>Submitted values</h3>

    <table class="result-table">

        <tr>
            <td>First Name</td>
            <td><?= $firstname ?></td>
        </tr>

        <tr>
            <td>Last Name</td>
            <td><?= $lastname ?></td>
        </tr>

        <tr>
            <td>Gender</td>
            <td><?= $gender ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><?= $email ?></td>
        </tr>

        <tr>
            <td>Company</td>
            <td><?= $company ?></td>
        </tr>

        <tr>
            <td>Reason</td>
            <td><?= $reason ?></td>
        </tr>

    </table>

<?php endif; ?>

</body>
</html>