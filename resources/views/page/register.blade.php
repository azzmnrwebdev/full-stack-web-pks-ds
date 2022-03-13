<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form Sign Up</title>
</head>

<body>
    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>
    <!-- Awal Form Sign Up -->
    <form action="/welcome" method="POST">
        @csrf
        <!-- Input Field -->
        <label>First name:</label><br /><br />
        <input type="text" name="firstname"><br /><br />
        <label>Last name:</label><br /><br />
        <input type="text" name="lastname"><br /><br />

        <!-- Radio Button -->
        <label>Gender:</label><br /><br />
        <input type="radio" name="jkelamin"> Male <br />
        <input type="radio" name="jkelamin"> Female <br />
        <input type="radio" name="jkelamin"> Other <br />

        <!-- Select Element -->
        <label for="nationality">Nationality:</label><br /><br />
        <select>
            <option>Indonesia</option>
            <option>Amerika</option>
            <option>Inggris</option>
        </select>
        <br /><br />

        <!-- Check Box -->
        <label for="language_spoken">Language Spoken:</label><br /><br />
        <input type="checkbox"> Bahasa Indonesia <br />
        <input type="checkbox"> English <br />
        <input type="checkbox"> Other <br /><br />

        <!-- Textarea -->
        <label for="bio">Bio:</label><br /><br />
        <textarea name="textarea" id="textarea1" cols="30" rows="10"></textarea>
        <br />

        <!-- Button Sign Up -->
        <input type="Submit" value="Sign Up">
    </form>
    <!-- Akhir Form -->
</body>

</html>
