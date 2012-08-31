<? foreach ($pages as $page): ?>
    <li>
		<a href="<?= $page->url ?>"><?= h($page->navigation_label()) ?></a>
	</li>
<? endforeach ?>
