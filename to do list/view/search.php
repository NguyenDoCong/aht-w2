<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <input type="hidden" name="page" value="search">
        <input type="text" id="search" name="search"
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <input type="submit" value="Search">
    </form>

    <?php if (isset($tasks) && !empty($tasks)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $key => $task): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $task->title ?></td>
                        <td><?php echo $task->status ?></td>
                        <td><?php echo $task->content ?></td>
                        <td>
                            <a href="./index.php?page=delete&id=<?php echo $task->id; ?>" class="btn btn-warning btn-sm">Delete</a>
                            <a href="./index.php?page=edit&id=<?php echo $task->id; ?>" class="btn btn-sm">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($_POST['search'])): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>

</html>