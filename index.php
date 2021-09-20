<html lang="UTF-8">
<head>
    <?php
        require_once 'vendor/autoload.php';
        use Spatie\CalendarLinks\Link;
    ?>
    <title>Calendar</title>
</head>
<body>

<?php
    if(!isset($_POST['title'])) $_POST['title'] = null;
    if(!isset($_POST['from'])) $_POST['from'] = null;
    if(!isset($_POST['to'])) $_POST['to'] = null;
    if(!isset($_POST['description'])) $_POST['description'] = null;
    if(!isset($_POST['address'])) $_POST['address'] = null;
?>

    <form method="post">

        <label for="title">Title: </label><br>
        <input type="text" id="title" name="title" value="<?php echo $_POST['title']; ?>"><br>
        <label for="from">From: </label><br>
        <input type="text" id="from" name="from" value="<?php echo $_POST['from']; ?>"><br>
        <label for="to">To: </label><br>
        <input type="text" id="to" name="to" value="<?php echo $_POST['to']; ?>"><br>
        <label for="description">Description: </label><br>
        <input type="text" id="description" name="description" value="<?php echo $_POST['description']; ?>"><br>
        <label for="address">Address: </label><br>
        <input type="text" id="address" name="address" value="<?php echo $_POST['address']; ?>"><br><br>
        <input type="submit" name="submit" value="Submit calendar"><br><br>

        <label for="links">Choose the calendar: </label>
        <select name="links" id="links">
            <option>Google</option>
            <option>Yahoo</option>
            <option>Outlook</option>
        </select>

    </form>

<?php

    $requiredFields = ['title', 'from', 'to'];

    if(isset($_POST['submit'])) {

        $error = false;
        foreach($requiredFields as $field){
            if(empty($_POST[$field])) {
                $error = true;
                $field = strtoupper($field);
                echo "$field field is required!<br>";
            }
        }

        if(!$error){
            $from = DateTime::createFromFormat('Y-m-d H:i', $_POST['from']);
            $to = DateTime::createFromFormat('Y-m-d H:i', $_POST['to']);

            $link = Link::create($_POST['title'], $from, $to)
                ->description($_POST['description'])
                ->address($_POST['address']);

            if($_POST['links'] === "Google") echo '<a href="' . $link->google() . '" target="_blank">Google Link</a>';
            if($_POST['links'] === "Yahoo") echo '<a href="' . $link->yahoo() . '" target="_blank">Yahoo Link</a>';
            if($_POST['links'] === "Outlook") echo '<a href="' . $link->webOutlook() . '" target="_blank">Outlook Link</a>';
        }
    }

?>

</body>
</html>