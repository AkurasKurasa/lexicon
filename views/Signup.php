<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="signupForm">
        <div>
            <label for="">First Name</label>
            <input type="text">
        </div>

        <div>
            <label for="">Last Name</label>
            <input type="text">
        </div>

        <div>
            <label for="">Email</label>
            <input type="text">
        </div>

        <div>
            <label for="">Gender</label>
            <input type="radio" id="html" name="fav_language" value="HTML">
            <label for="html">Male</label><br>
            <input type="radio" id="css" name="fav_language" value="CSS">
            <label for="css">Female</label><br>
            <input type="radio" id="javascript" name="fav_language" value="JavaScript">
            <label for="javascript">Other</label>
            <input type="radio" id="css" name="fav_language" value="CSS">
            <label for="css">Prefer not to say</label><br>
        </div>

        <div>
            <label for="">Password</label>
            <input type="text">
        </div>

        <div>
            <label for="">Confirm Password</label>
            <input type="text">
        </div>

        <button>Create Account</button>

    </form>
    <button id="test">Create Account</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../script.js"></script>
</html>