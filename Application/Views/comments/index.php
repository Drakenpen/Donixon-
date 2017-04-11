<div class="container">

  <center><img width="25%" height="25%" alt="Blijven Moven" src="<?php echo URL; ?>img/moveisdetip.gif"></center>

<div align= "center" class="geluidjes">
  <form method='post' action="<?php echo URL; ?>comments/addcomment" onsubmit="return post();">
  <textarea name="comment" placeholder="Hier mag je lekker typperen." required></textarea>
  <br>
  <input type="text" name="name" placeholder="Naampie" required>
  <br>
  <input type="submit" name="submit_add_comment" value="GOGOGO">
  </form>
</div>

<div align= "center" class="geluidjes">
	<p>Commenties:</p>
    <?php foreach ($comments as $comment) { ?>

    <div class="comment_div"> 
    <p class="name">Met dank aan: <b><?php if (isset($comment->name)) echo htmlspecialchars($comment->name, ENT_QUOTES, 'UTF-8'); ?></b></p>
    <p class="comment"><?php if (isset($comment->comment)) echo htmlspecialchars($comment->comment, ENT_QUOTES, 'UTF-8'); ?></p> 
    <p class="time"><?php if (isset($comment->post_time)) echo htmlspecialchars($comment->post_time, ENT_QUOTES, 'UTF-8'); ?></p>
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


