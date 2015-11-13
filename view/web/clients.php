<!DOCTYPE html>
<html lang="clients">
<head>
    <meta charset="UTF-8">
    <title>CRUD example</title>

    <link rel="stylesheet" type="text/css" href="view/web/clients.css">
</head>
<body>

<h1>CRUD example</h1>

<table>
    <tr>
        <th>Email (Use this field when updating)</th>
        <th>Name</th>
        <th>Mobile</th>
        <th></th>
    </tr>
<?php

    foreach($clients as $client) {
?>
    <tr>
        <td><?=$client->get_email()?></td>
        <td><?=$client->get_name()?></td>
        <td><?=$client->get_mobile()?></td>
        <td class="td_bt"><form action="index.php" method="GET">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="client_email" value="<?=$client->get_email()?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    <tr>
<?php
    }
?>
</table>

<br/>

<form action="index.php" method="GET">
    <input type="hidden" name="action" value="insert">
    Email: <input type="text" name="client_email">
    Name: <input type="text" name="client_name">
    Mobile: <input type="text" name="client_mobile">
    <input type="submit" value="Insert">
</form>

<br/>

<form action="index.php" method="GET">
    <input type="hidden" name="action" value="update">
    Email: <input type="text" name="client_email">
    Name: <input type="text" name="client_name">
    Mobile: <input type="text" name="client_mobile">
    <input type="submit" value="Update">
</form>

<?php 
    if(isset($alert)) { 
?>
    <script type="text/javascript">
        alert('<?=$alert?>');
    </script>
<?php 
    } 
?>
</body>
</html>
