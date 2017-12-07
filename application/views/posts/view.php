<h3 class="center"><?php echo $post['title']; ?></h3>
<div class="row">
  <div class="col l4 m5">
    <img class="materialboxed" width="350" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
  </div>
  <div class="col l7 offset-l1 m5 offset-m2">
    <p><?php echo $post['body']; ?></p>
    <br>
    <p>Edited on: <?php echo $post['created_at']; ?></p>
    <br>
    <?php if ($this->session->userdata('user_id') == $post['user_id']): ?>
      <?php echo form_open('/posts/delete/'.$post['id']); ?>
        <button type="submit" value="Delete" class="btn btn-danger">Delete Review!</button>
        <a class="btn btn-info" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit This Review!</a>
      <?php endif; ?>
        <a class="btn btn-success" href="<?php echo base_url(); ?>posts">Back to Reviews!</a>
  </div>

</div>