<?php
/* @var $this \Render\Abstracts\Controller */
?>
<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'content-test',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'image-link-test',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'cloud-words',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'cloud-words-links',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'list-test',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'list-links',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'images-test',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'images-links-test',
    ]);
    ?></div>


<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'content-test-man',
        'type' => \Widgets\Block::TYPE_CONTENT,
        'name' => 'User-内容',
        'data' => '<p>这是显示内容</p><p>这是显示内容</p><p>这是显示内容</p><p>这是显示内容</p>',
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'image-links-test-man',
        'type' => \Widgets\Block::TYPE_IMAGE_LINK,
        'name' => 'User-图片',
        'data' => [
            'src' => 'https://www.baidu.com/img/baidu_resultlogo@2.png',
            'alt' => '百度',
            'link' => 'https://www.baidu.com',
        ],
    ]);
    ?></div>

<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'cloud-words-test-man',
        'type' => \Widgets\Block::TYPE_CLOUD_WORDS,
        'name' => 'User-云词',
        'data' => [
            [
                'label' => '百度',
            ],
            [
                'label' => 'Google',
            ],
            [
                'label' => 'Sina',
            ],
        ],
    ]);
    ?></div>


<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'cloud-words-links-test-man',
        'type' => \Widgets\Block::TYPE_CLOUD_WORDS_LINKS,
        'name' => 'User-链接云词',
        'data' => [
            [
                'is_blank' => 1,
                'label' => '百度',
                'link' => 'http://www.baidu.com',
            ],
            [
                'is_blank' => 0,
                'label' => 'Google',
                'link' => 'http://www.google.com',
            ],
            [
                'is_blank' => 1,
                'label' => 'sina',
                'link' => 'http://www.sina.com',
            ],
        ],
    ]);
    ?></div>


<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'list-test-man',
        'type' => \Widgets\Block::TYPE_LIST,
        'name' => 'User-列表',
        'data' => [
            [
                'label' => '百度-列表',
            ],
            [
                'label' => 'Google-列表',
            ],
            [
                'label' => 'sina-列表',
            ],
        ],
    ]);
    ?></div>


<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'list-links-test-man',
        'type' => \Widgets\Block::TYPE_LIST_LINKS,
        'name' => 'User-链接列表',
        'data' => [
            [
                'is_blank' => 1,
                'label' => '百度-列表',
                'link' => 'http://www.baidu.com',
            ],
            [
                'is_blank' => 1,
                'label' => 'Google-列表',
                'link' => 'http://www.google.com',
            ],
            [
                'is_blank' => 1,
                'label' => 'sina-列表',
                'link' => 'http://www.sina.com',
            ],
        ],
    ]);
    ?></div>


<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'images-test-man',
        'type' => \Widgets\Block::TYPE_IMAGES,
        'name' => 'User-图片集',
        'data' => [
            [
                'is_blank' => 1,
                'src' => 'https://www.baidu.com/img/baidu_resultlogo@2.png',
                'label' => '百度-列表',
            ],
            [
                'is_blank' => 1,
                'src' => 'https://www.baidu.com/img/baidu_resultlogo@2.png',
                'label' => '百度-列表',
            ],
        ],
    ]);
    ?></div>


<div class="row margin-bottom"><?php
    $this->widget('\Widgets\Block', [
        'uniqueKey' => 'images-links-test-man',
        'type' => \Widgets\Block::TYPE_IMAGES_LINKS,
        'name' => 'User-链接图片集',
        'data' => [
            [
                'is_blank' => 1,
                'src' => 'https://www.baidu.com/img/baidu_resultlogo@2.png',
                'label' => '百度-列表',
                'link' => 'https://www.baidu.com',
            ],
            [
                'is_blank' => 1,
                'src' => 'https://www.baidu.com/img/baidu_resultlogo@2.png',
                'label' => '百度-列表',
                'link' => 'https://www.baidu.com',
            ],
        ],
    ]);
    ?></div>
