<?php

use Spatie\CalendarLinks\Link;

$requiredFields = ['title', 'from', 'to'];

if (isset($_POST['submit'])) {

    $error = false;

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $error = true;
            $field = strtoupper($field);
            echo "$field field is required!<br>";
        }
    }

    if ($_POST['from'] > $_POST['to'] && $_POST['to'] !== "") {
        $error = true;
        echo "Starting date cannot be later than ending date!<br>";
    }

    if ($_POST['from'] < date("Y-m-d\TH:i" && $_POST['from'] !== "")) {
        $error = true;
        echo "You cannot choose the time in the past!<br>";
    }

    if (!$error) {
        $from = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['from']);
        $to = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['to']);

        $link = Link::create($_POST['title'], $from, $to)
            ->description($_POST['description'])
            ->address($_POST['address']);

        if ($_POST['links'] === "Google") echo '<a href="' . $link->google() . '" target="_blank">Google Link</a>';
        if ($_POST['links'] === "Yahoo") echo '<a href="' . $link->yahoo() . '" target="_blank">Yahoo Link</a>';
        if ($_POST['links'] === "Outlook") echo '<a href="' . $link->webOutlook() . '" target="_blank">Outlook Link</a>';
    }
}