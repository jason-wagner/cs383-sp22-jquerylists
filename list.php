<?php

// $conn created in this file is a PDO object
require_once 'mysql.php';

$query = $conn->query("SELECT * FROM list ORDER BY id");

?>
<!doctype html>
<html>
    <head>
        <title>List Test</title>
        <style>.font-bold {font-weight: bold;}</style>
    </head>
    <body>
        <ul id="mylist">

        <?php
            while($row = $query->fetch())
                echo "<li data-id=\"{$row['id']}\">{$row['item']}</li>\n";
        ?>

        </ul>


        <input type="text" id="new-item">
        <button type="button" id="add-button">Add Item</button>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function () {
                $('#mylist').on('click', 'li', function() {
                    var listid = $(this).data('id');
                    $.post('listdel.php', {id: listid}, function() {
						$('li[data-id=' + listid + ']').remove();
                    });
                });

                $('#add-button').on('click', function() {
                    var newitem = $('#new-item').val();
                    $.post('listadd.php', {item: newitem}, function(returndata) {
                        $('#mylist').append('<li data-id="'+ returndata + '">' + newitem + '</li>');
                    });

                    $('#new-item').val('');
                });
            });
        </script>
    </body>
</html>
