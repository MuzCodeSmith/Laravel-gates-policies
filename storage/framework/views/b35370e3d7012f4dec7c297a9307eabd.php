<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   /* General Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* Table Header Styling */
.table thead {
    background-color: #04AA6D;
    color: #ffffff;
    text-align: left;
}

/* Header Row */
.table thead tr {
    font-size: 16px;
}

/* Header Cells */
.table thead th {
    padding: 12px 15px;
    font-weight: bold;
}

/* Table Rows */
.table tbody tr {
    transition: background-color 0.2s ease-in-out;
}

/* Alternating Row Colors */
.table tbody tr:nth-child(odd) {
    background-color: #f8f9fa;
}

/* Hover Effect */
.table tbody tr:hover {
    background-color: #e9ecef;
}

/* Table Data Cells */
.table tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
}

/* Actions Column */
.table tbody td:last-child {
    text-align: center;
}

/* Buttons */
.btn-sm {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.2s ease-in-out;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: #ffffff;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}




   
</style>
<body>

<div class="container">
    <!-- Success & Error Messages -->
    <?php if(Session::has('success')): ?>
        <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
    <?php endif; ?>

    <!-- Posts Table -->
    <h2 class="text-center">Your Posts</h2>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($post->id); ?></td>
                    <td><?php echo e($post->title); ?></td>
                    <td><?php echo e($post->content); ?></td>
                    <td><?php echo e($post->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('users.posts.edit',['post'=> $post->id])); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">No posts found</td>
                </tr>
            <?php endif; ?>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\gates-policies\resources\views/user/list-posts.blade.php ENDPATH**/ ?>