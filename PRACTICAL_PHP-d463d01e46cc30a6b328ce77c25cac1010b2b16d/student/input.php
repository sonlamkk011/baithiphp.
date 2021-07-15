<?php
require_once ('dbhelp.php');

$s_bookid = $s_authorid = $s_title = $s_isbn = $s_pub_year = $s_available = '';

if (!empty($_POST)) {
    $s_id = '';

    if (isset($_POST['bookid'])) {
        $s_bookid = $_POST['bookid'];
    }

    if (isset($_POST['authorid'])) {
        $s_authorid = $_POST['authorid'];
    }

    if (isset($_POST['title'])) {
        $s_title = $_POST['title'];
    }
    if (isset($_POST['ISBN'])) {
        $s_isbn = $_POST['ISBN'];
    }

    if (isset($_POST[''])) {
        $s_pub_year = $_POST['pub_year'];
    }

    if (isset($_POST['tinyint'])) {
        $s_available = $_POST['tinyint'];
    }

    if (isset($_POST['id'])) {
        $s_id = $_POST['id'];
    }

    $s_bookid = str_replace('\'', '\\\'', $s_bookid);
    $s_authorid      = str_replace('\'', '\\\'', $s_authorid);
    $s_title  = str_replace('\'', '\\\'', $s_title);
    $s_isbn = str_replace('\'', '\\\'', $s_isbn);
    $s_pub_year      = str_replace('\'', '\\\'', $s_pub_year);
    $s_available  = str_replace('\'', '\\\'', $s_available);
    $s_id       = str_replace('\'', '\\\'', $s_id);

    if ($s_id != '') {
        //update
        $sql = "update student set bookid = '$s_bookid', authorid = '$s_authorid', title = '$s_title', isbn = '$s_isbn', pub_year = '$s_pub_year', available = '$s_available' where id = " .$s_id;
    } else {
        //insert
        $sql = "insert into student(bookid, authorid, title, isbn, pub_year, available) value ('$s_bookid', '$s_authorid', '$s_title', '$s_isbn', '$s_pub_year', '$s_available')";
    }

    // echo $sql;

    execute($sql);

    header('Location: index.php');
    die();
}

$id = '';
if (isset($_GET['id'])) {
    $id          = $_GET['id'];
    $sql         = 'select * from student where id = '.$id;
    $studentList = executeResult($sql);
    if ($studentList != null && count($studentList) > 0) {
        $std        = $studentList[0];
        $s_bookid = $std['bookid'];
        $s_authorid    = $std['authorid'];
        $s_title  = $std['title'];
        $s_isbn = $std['isbn'];
        $s_pub_year      = $std['pub_year'];
        $s_available  = $std['available'];
    } else {
        $id = '';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registation Form * Form Tutorial</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Add Student</h2>
        </div>
        <div class="panel-body">
            <form method="post">
                <div class="form-group">
                    <label for="usr">bookid:</label>
                    <input type="number" name="id" value="<?=$id?>" style="display: none;">
                    <input required="true" type="text" class="form-control" id="usr" name="bookid" value="<?=$s_bookid?>">
                </div>

                <div class="form-group">
                    <label for="birthday">authorid:</label>
                    <input type="text" class="form-control" id="authorid" name="authorid" value="<?=$s_authorid?>">
                </div>
                <div class="form-group">
                    <label for="address">title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$s_title?>">
                </div>

                <div class="form-group">
                    <label for="birthday">isbn:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?=$s_isbn?>">
                </div>

                <div class="form-group">
                    <label for="birthday">pub_year:</label>
                    <input type="text" class="form-control" id="pub_year" name="pub_year" value="<?=$s_pub_year?>">
                </div>
                <div class="form-group">
                    <label for="address">available:</label>
                    <input type="text" class="form-control" id="available" name="available" value="<?=$s_available?>">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>