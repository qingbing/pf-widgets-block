<?php
// 引用类
use Widgets\Block;

/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-05-12
 * Version      :   1.0
 * @var string $type
 * @var string $name
 * @var mixed $options
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $name; ?></h3>
    </div>
    <?php
    switch ($type) {
        case Block::TYPE_CONTENT: ?>
            <div class="panel-body"><?php echo $options; ?></div>
            <?php break;
        case Block::TYPE_IMAGE_LINK: ?>
            <div class="panel-body"><?php
                if (empty($options['link'])) { ?>
                    <img src="<?php echo $options['src'] ?>" class="full-image"<?php if (!empty($options['alt'])) {
                        echo " alt='{$options['alt']}'";
                    } ?>>
                <?php } else { ?>
                    <a href="<?php echo $options['link']; ?>">
                        <img src="<?php echo $options['src'] ?>" class="full-image"<?php if (!empty($options['alt'])) {
                            echo " alt='{$options['alt']}'";
                        } ?>></a>
                <?php } ?>
            </div>
            <?php break;
        case Block::TYPE_CLOUD_WORDS: ?>
            <div class="panel-body">
                <ul class="cloud_words">
                    <?php foreach ($options as $option) { ?>
                        <li><?php echo $option['label']; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php break;
        case Block::TYPE_CLOUD_WORDS_LINKS: ?>
            <div class="panel-body">
                <ul class="cloud_words">
                    <?php foreach ($options as $option) {
                        $target = (isset($option['is_blank']) && $option['is_blank']) ? ' target="_blank"' : '';
                        ?>
                        <li>
                            <a href="<?php echo $option['link']; ?>"<?php echo $target; ?>><?php echo $option['label']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php break;
        case Block::TYPE_LIST: ?>
            <ul class="list-group">
                <?php foreach ($options as $option) { ?>
                    <li class="list-group-item ellipsis"><?php echo $option['label']; ?></li>
                <?php } ?>
            </ul>
            <?php break;
        case Block::TYPE_LIST_LINKS: ?>
            <ul class="list-group">
                <?php foreach ($options as $option) {
                    $target = (isset($option['is_blank']) && $option['is_blank']) ? ' target="_blank"' : '';
                    ?>
                    <li class="list-group-item ellipsis">
                        <a href="<?php echo $option['link']; ?>"<?php echo $target; ?>><?php echo $option['label']; ?></a>
                    </li>
                <?php } ?>
            </ul>
            <?php break;
        case Block::TYPE_IMAGES: ?>
            <ul class="list-group">
                <?php foreach ($options as $option) { ?>
                    <li class="list-group-item">
                        <img src="<?php echo $option['src']; ?>" alt="<?php echo $option['label']; ?>">
                    </li>
                <?php } ?>
            </ul>
            <?php break;
        case Block::TYPE_IMAGES_LINKS: ?>
            <ul class="list-group">
                <?php foreach ($options as $option) {
                    $target = (isset($option['is_blank']) && $option['is_blank']) ? ' target="_blank"' : '';
                    ?>
                    <li class="list-group-item">
                        <a href="<?php echo $option['link']; ?>"<?php echo $target; ?>>
                            <img src="<?php echo $option['src']; ?>" alt="<?php echo $option['label']; ?>">
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php break;
        default:
            throw new \Exception('未知的小区块显示类型', '104000201');
    }
    ?>
</div>