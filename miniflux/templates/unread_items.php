<?php if (empty($items)): ?>

    <p class="alert alert-info">Nothing to read.</p>

<?php else: ?>

    <div class="page-header">
        <h2>Unread items</h2>
        <ul>
            <li><a href="?action=flush-unread">flush</a></li>
        </ul>
    </div>

    <section class="items">
    <?php $items_id = array() ?>
    <?php foreach ($items as $item): ?>
        <?php array_push($items_id, urlencode($item['id'])) ?>
        <article id="item-<?= urlencode($item['id']) ?>">
            <h2><a href="<?= $item['url'] ?>" rel="noreferrer" target="_blank" data-item-id="<?= urlencode($item['id']) ?>" data-action="mark-read"><?= Helper\escape($item['title']) ?></a></h2>
            <p class="preview"  data-item-id="<?= urlencode($item['id']) ?>" data-action="mark-read">
                <?= Helper\escape(Helper\summary(strip_tags($item['content']), 50, 300)) ?>
            </p>
            <p>
                <?= Helper\get_host_from_url($item['url']) ?> |
                <a href="?action=read&amp;id=<?= urlencode($item['id']) ?>">embedded link</a> |
                <a href="javascript:return;" rel="noreferrer" data-item-id="<?= urlencode($item['id']) ?>" data-action="mark-read">mark as read</a> |
                <a href="javascript:return;" rel="noreferrer" data-items-id="<?= join($items_id, " ") ?>" data-action="mark-previous-read">mark previous as read</a>
            </p>
        </article>
    <?php endforeach ?>
    </section>

<?php endif ?>
