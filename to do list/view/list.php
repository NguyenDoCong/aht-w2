<?php
include "layout/header.php"
?>
<div>
    <h2>Danh sách Task</h2>
    <a href="./index.php?page=add">Thêm mới</a><br><br>
</div>
<div>
    <form action="" method="get">
        <input type="hidden" name="page" value="todos">
        <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <input type="submit" value="Search">
    </form>
    <br>
</div>
<div>
    <form action="" method="get">
        <input type="hidden" name="page" value="todos">
        <input type="submit" value="Low" name="Low">
        <input type="submit" value="Medium" name="Medium">
        <input type="submit" value="High" name="High">
        <input type="submit" value="All" name="All">
    </form>
</div>
<div>
    <form action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>title</th>
                    <th>status</th>
                    <th>content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $key => $task): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $task->title ?></td>
                        <td><?php
                            ?>
                            <input type="checkbox" id="completed-<?php echo $task->id; ?>" name="completed[]" value="<?php echo $task->id; ?>" <?php if ($task->status) echo 'checked'; ?>>
                            <label for="completed-<?php echo $task->id; ?>">Completed</label>
                        </td>
                        <td><?php echo $task->content ?></td>
                        <td><?php echo $task->priority ?></td>
                        <td> <a href="./index.php?page=delete&id=<?php echo $task->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
                        <td> <a href="./index.php?page=edit&id=<?php echo $task->id; ?>" class="btn btn-sm">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input type="submit" value="Update">
    </form>
</div>