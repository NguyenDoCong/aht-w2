<h1>Bạn chắc chắn muốn xóa Task này?</h1>
<h3><?php echo $task->title; ?></h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $task->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-default" href="index.php?page=todos">Cancel</a>
    </div>
</form>