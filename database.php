<?php 
function make_connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todoapp";

        //create connetcion on databese
    $con = new mysqli($host, $username, $password, $dbname);

    //If any error is appear 
    if($con->connect_error)
    {
        echo "There is an error in Database connection ".$con->connect_error;
    }
    return $con;
    // echo "Successsfully connected";
}


function add_items($value)
{
    $con = make_connection();
    $query = "INSERT INTO todolist(Id, Item, Status) VALUES(NULL, '$value', '0')";
    $con->query($query);
}
function get_items()
{
    $con = make_connection();
    $query = "SELECT Id, Item from todolist WHERE Status='0'";
    $result = $con->query($query);
    return $result;
}
function get_items_checked()
{
    $con = make_connection();
    $query = "SELECT Id, Item from todolist WHERE Status='1'";
    $result = $con->query($query);
    return $result;
}
function update_items($Id)
{
    $con = make_connection();
    $query = "UPDATE todolist set Status='1' WHERE id='$Id'";
    $result = $con->query($query);
}
function delete_items($Id)
{
    $con = make_connection();
    $query = "DELETE from todolist WHERE id='$Id'";
    $result = $con->query($query);
}


?>