<?php
$status = $_GET['status'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <?php if ($status === 'success'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully submitted information!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6 d-grid">
                    <a class="btn btn-primary" href="create.php" role="button">Add Another Client</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6 d-grid">
                    <a class="btn btn-outline-secondary" href="index.php" role="button">Go to Client List</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>There was an issue with the submission. Please try again!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
