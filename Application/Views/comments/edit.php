<div class="container">
<hr class="featurette-divider">
    <div align= "center" class="geluidjes">
        <h3>Edit a comment</h3>
        <form action="<?php echo URL; ?>comments/updatecomment" method="POST">
            <input type="text" name="comment" value="<?php echo htmlspecialchars($comment->comment, ENT_QUOTES, 'UTF-8'); ?>" required />
            <br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($comment->name, ENT_QUOTES, 'UTF-8'); ?>" required /><br>
            <input type="hidden" name="comment_id" value="<?php echo htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_comment" value="Update" />
        </form>
    </div>
