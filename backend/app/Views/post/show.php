<h3><?= esc($post['title']) ?></h3>
<article>
<p>
    <?= nl2br(esc($post['content'])) ?>
</p>
<p>
    <?= nl2br(esc($post['author'])) ?>
</p>
</article>