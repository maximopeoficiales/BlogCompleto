
<section class="s-featured">
    <div class="row">
        <div class="col-full">
            <h2>Crear Post</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input placeholder="Post Title" type="text" name="title">
                <input placeholder="Post Intro" type="text" name="intro">
                <textarea id="summernote" name="content" placeholder="Ingresa el contenido"></textarea>
                <select name="category">
                    <?php
                    foreach ($categories as $c) {
                        echo "
            <option value='" . $c['id_cat'] . "'>" . $c['name'] . "</option>
            ";
                    }
                    ?>
                </select>
                <input placeholder="Tags" type="text" name="tags">
                <input type="file" name="banner"><br>
                <input type="submit" value="Send">
        </div>
    </div>
    </form>
</section>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>