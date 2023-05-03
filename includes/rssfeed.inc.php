<?php
$url = item("links", "rss");
$rss_feed = simplexml_load_file($url);
if (!empty($rss_feed)) {
    $i = 0;
    foreach ($rss_feed->channel->item as $feed_item) {
        if ($i >= 2) break;
        ?>
        <dl>
            <dt><a class="feed_title" href="<?php echo $feed_item->link; ?>"
                   target="_blank"><?php echo $feed_item->title; ?></a></dt>
            <dd><?php echo implode(' ', array_slice(explode(' ', $feed_item->description), 0, 5)) . "..."; ?></dd>
        </dl>
        <?php
        $i++;
    }
}
?>