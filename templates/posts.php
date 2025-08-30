

<div class="container">
    <?php if (!empty($posts)): ?>
    <div class="posts-container">
        <h4>All News</h4>
        <div class="posts-list">
        <?php foreach ($posts as $post):?>
            <div class="post">
                <div class="title-post"><?=htmlspecialchars($post['title'])?></div> 
                <div class="desc-post"><?=htmlspecialchars($post['description'])?></div>
                <div class="pict-group">
                    <a href="#" 
                        class="edit-btn" 
                        data-id="<?=$post['id']?>" 
                        data-title="<?=htmlspecialchars($post['title']) ?>" 
                        data-description="<?= htmlspecialchars($post['description'])?>">
                        <div class="pict edit-pict" title="Edit Post">
                            <img src="src/img/pencil.svg"/>
                        </div>
                    </a>
                    <a href="index.php?delete=<?=$post['id']?>">
                        <div class="pict delete-pict" title="Remove Post">
                            <img src="src/img/close.svg"/>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
    <?php endif; ?>
    <div class="edition-container">
    <div class="post-form">
        <div class="title-header">
            <h4 id="form-title">Create News</h4>
            <?php if (!empty($posts)): ?>
            <div class="pict-cross" id="close-form" title="Back to create post">
                <img src="src/img/close.svg"/>
            </div>
            <?php endif; ?>
        </div>
        <form method="post" action="index.php" id="postForm">
            <input type="hidden" name="action" value="create" id="form-action">
            <input type="hidden" name="id" value="" id="form-id">

            <input type="text" name="title" placeholder="title" minlength="1" required id="form-title-input"><br><br>
            <textarea name="description" placeholder="description" minlength="1" required id="form-desc-input"></textarea><br><br>

            <button type="submit" id="form-submit">Create</button>
        </form>
        <a href="index.php?logout=1"><button>Logout</button></a>
    </div>
    </div>
</div>

