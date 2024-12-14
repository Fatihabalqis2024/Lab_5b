<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    
</head>

<body>
    <form action="insert.php" method="post"> <!-- Pendaftaran form -->
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br> <!-- Label & input untuk matric -->
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br> <!-- Label & input untuk name -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br> <!-- Label & input untuk password -->
        
        <label for="role">Role:</label> <!-- Dropdown untuk role -->
        <select name="role" id="role" required>
            <option value="">Please select</option>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select><br>
        <input type="submit" name="submit" value="Register"> <!-- Register button -->
    </form>

</body>

</html>

