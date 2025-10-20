<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <form action="<?= route('users.edit') ?>" method="POST">
        @csrf
        <label for="">Name:</label>
        <input type="text" name="name" value="<?= $user->name ?>">
        <br/>
        <label for="">Family:</label>
        <input type="text" name="family" value="<?= $user->family ?>">

        <button type="submit">Save</button>
    </form>
</body>
</html>
