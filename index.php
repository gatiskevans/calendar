<html lang="UTF-8">
<head>
    <title>Calendar</title>
</head>
<body>

    <?php
        require_once 'vendor/autoload.php';
        require_once 'includes/isset.inc.php';
        require_once 'includes/timezone.php';
    ?>

    <form method="post">

        <label for="title">Title: </label><br>
        <input type="text" id="title" name="title" value="<?= $_POST['title']; ?>"><br>
        <label for="from">From: </label><br>
        <input type="datetime-local" id="from" name="from" value="<?= $_POST['from']; ?>"><br>
        <label for="to">To: </label><br>
        <input type="datetime-local" id="to" name="to" value="<?= $_POST['to']; ?>"><br>
        <label for="description">Description: </label><br>
        <input type="text" id="description" name="description" value="<?= $_POST['description']; ?>"><br>
        <label for="address">Address: </label><br>
        <input type="text" id="address" name="address" value="<?= $_POST['address']; ?>"><br><br>
        <input type="submit" name="submit" value="Submit calendar"><br><br>

        <label for="links">Choose the calendar: </label>
        <select name="links" id="links">
            <option>Google</option>
            <option>Yahoo</option>
            <option>Outlook</option>
        </select>

    </form>

    <?php
        require_once 'includes/main.inc.php';
    ?>

</body>
</html>