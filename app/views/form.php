<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mode === 'edit' ? 'Edit Student' : 'Add Student' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1><?= $mode === 'edit' ? 'Edit Student' : 'Add Student' ?></h1>

    <form method="post" action="<?= $action ?>">
     <input type="text" class="form-control" id="firstname" name="firstname"
       value="<?= $student['firstname'] ?? '' ?>" required>

<input type="text" class="form-control" id="lastname" name="lastname"
       value="<?= $student['lastname'] ?? '' ?>" required>

<input type="email" class="form-control" id="email" name="email"
       value="<?= $student['email'] ?? '' ?>" required>

        <button type="submit" class="btn btn-success"><?= $mode === 'edit' ? 'Update' : 'Create' ?></button>
        <a href="/students" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>