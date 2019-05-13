# pf-widgets-block
## 描述
渲染部件——页面静态的小模块

## 注意事项
- 引用的主要小部件
    - qingbing/php-file-cache
    - qingbing/php-database
    - qingbing/php-render
    - qingbing/pf-tools-upload

## 使用方法
### 1、 使用数据库记录
```php
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

```

### 2、 使用代码定义
```php


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
```

## ====== 异常代码集合 ======

异常代码格式：1040 - XXX - XX （组件编号 - 文件编号 - 代码内异常）
```
 - 104000101 : 未指定小区块关键字
 - 104000102 : 未指定小区块显示类型
 - 104000103 : 未指定小区块显示内容
 - 104000104 : 未找到指定的小区块
 - 104000105 : 未知的小区块显示类型
 - 104000106 : 没有上传图片
 
 - 104000201 : 未知的小区块显示类型
```