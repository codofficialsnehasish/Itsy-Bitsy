<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Request Details</h3>
    <table>
        <tr>
            <td>Name : </td>
            <td><?= $userdata['name'];?></td>
        </tr>
        <tr>
            <td>Phone : </td>
            <td><?= $userdata['phone'];?></td>
        </tr>
        <tr>
            <td>Message : </td>
            <td><?= $userdata['msg'];?></td>
        </tr>
    </table>
</body>
</html>