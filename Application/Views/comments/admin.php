<div align= "center" class="geluidjes">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Comment</td>
                <td>From</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment) { ?>
                <tr>
                    <td><?php if (isset($comment->id)) echo htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($comment->name)) echo htmlspecialchars($comment->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($comment->comment)) echo htmlspecialchars($comment->comment, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'comments/deleteComment/' . htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
                    <td><a href="<?php echo URL . 'comments/editComment/' . htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>


        </table>
    </div>                       

<hr class="featurette-divider">


<div class="container">

  <center><img width="25%" height="25%" alt="Blijven Moven" src="<?php echo URL; ?>img/paasfoto.png"></center>

<div align= "center" class="geluidjes">
    <p>Commenties:</p>
    <?php foreach ($comments as $comment) { ?>

    <div class="comment_div"> 
    <p class="name">Met dank aan: <b><?php if (isset($comment->name)) echo htmlspecialchars($comment->name, ENT_QUOTES, 'UTF-8'); ?></b></p>
    <p class="comment"><?php if (isset($comment->comment)) echo htmlspecialchars($comment->comment, ENT_QUOTES, 'UTF-8'); ?></p> 
    <p class="time"><?php if (isset($comment->post_time)) echo htmlspecialchars($comment->post_time, ENT_QUOTES, 'UTF-8'); ?></p>
        <td><a href="<?php echo URL . 'comments/deleteComment/' . htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
        <td><a href="<?php echo URL . 'comments/editComment/' . htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
    </div>

    <?php
    }
    ?>
</div>
  <audio id="song" autoplay="" loop="">
    <source src="lekkor.mp3" type="audio/mpeg">
  </audio>
</div>

<div>

<hr class="featurette-divider">