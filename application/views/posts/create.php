<h2 class="center"><?= $title ?></h2>
<div class="row">

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
    <div class="input-field col s12 m6">
      <input name="title" type="text">
      <label for="inputTitle">Title</label>
    </div>
    <div class="input-field col s12 m6">
      <select name="category_id">
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
      </select>
      <label>Choose Category</label>
    </div>
  </div>    
  <div class="row">
    <div class="input-field col s12">
      <label for="textArea">Review Body</label>
      <br>
      <br>
      <textarea id="textArea" name="body" class="materialize-textarea"></textarea>
    </div>
  </div>
  <div class="file-field input-field">
    <div class="btn">
      <span>Upload Image</span>
      <input type="file" name="userfile" size="20">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text">
    </div>
  </div>
  <a class="waves-effect waves-light btn" href="<?php echo base_url(); ?>">Back Home!</a>
  <a class="waves-effect waves-light btn" href="<?php echo base_url(); ?>posts">Back to Reviews!</a>
  <button class="btn waves-effect waves-light" type="submit">Submit
    <i class="material-icons right">send</i>
  </button>
  </form>

