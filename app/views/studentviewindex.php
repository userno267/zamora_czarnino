<!DOCTYPE html>
<html lang="en">
<<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1 class="mb-3">Students</h1>
    <a href="/students/create" class="btn btn-primary mb-3">Add Student</a>

    <?php if (!empty($students)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $s): ?>
                    <tr>
                        <td><?= $s['id'] ?></td>
                        <td><?= htmlspecialchars($s['firstname']) ?></td>
                        <td><?= htmlspecialchars($s['lastname']) ?></td>
                        <td><?= htmlspecialchars($s['email']) ?></td>
                        <td>
             <a href="/edit/<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="/delete/<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">No students found.</p>
    <?php endif; ?>
</body>
</html>