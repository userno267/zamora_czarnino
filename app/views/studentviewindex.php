<!DOCTYPE html>
<html lang="en">
<<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Students</h1>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>

    <!-- Only admins can see "Add Student" -->
    <?php if ($role === 'admin'): ?>
        <a href="/students/create" class="btn btn-primary mb-3">Add Student</a>
    <?php endif; ?>

    <!-- Search -->
    <form method="get" action="" class="mb-3 d-flex">
        <input type="text" name="q" class="form-control me-2"
               placeholder="Search students..."
               value="<?= htmlspecialchars($search ?? '') ?>">
        <button type="submit" class="btn btn-outline-secondary">Search</button>
    </form>

    <?php if (!empty($students)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <!-- Only admins see Actions column -->
                    <?php if ($role === 'admin'): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $s): ?>
                    <tr>
                        <td><?= $s['id'] ?></td>
                        <td><?= htmlspecialchars($s['firstname']) ?></td>
                        <td><?= htmlspecialchars($s['lastname']) ?></td>
                        <td><?= htmlspecialchars($s['email']) ?></td>
                        <?php if ($role === 'admin'): ?>
                            <td>
                                <a href="/edit/<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/delete/<?= $s['id'] ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this student?')">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-3">
            <?= $page ?>
        </div>
    <?php else: ?>
        <p class="text-muted">No students found.</p>
    <?php endif; ?>

</body>
</html>