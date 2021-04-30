<?php

echo "Hello from the docker yooooo container";

$mysqli = new mysqli("db", "root", "l3tm31n", "company1");

$sql = 'SELECT * FROM people';

if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }

    if($users) {
        foreach ($users as $user) {
            echo "<br>";
            echo "User: " . $user->name . " id: " . $user->id;
            echo "<br>";
        }
    } else {
        $sql = "INSERT INTO people (name) VALUES('sam')";
        $result = $mysqli->query($sql);
        $sql = "INSERT INTO people (name) VALUES('cam')";
        $result = $mysqli->query($sql);
        $sql = "INSERT INTO people (name) VALUES('jam')";
        $result = $mysqli->query($sql);
    }
}