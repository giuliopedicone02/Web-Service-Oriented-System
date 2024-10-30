<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post">
        Name: <input type="text" name="name" value="">
        <span class="error">* </span>
        <br><br>
        E-mail: <input type="text" name="email" value="">
        <span class="error">* </span>
        <br><br>
        Website: <input type="text" name="website" value="">
        <span class="error"></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span class="error">* </span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Your Input:</h2>
    <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];
    $gender = $_POST['gender'];

    echo "Nome: $name <br>";
    echo "E-mail: $email <br>";
    echo "Website: $website <br>";
    echo "Comment: $comment <br>";
    echo "Gender: $gender <br>";
    ?>
</body>

</html>