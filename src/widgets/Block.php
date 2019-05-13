<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-05-11
 * Version      :   1.0
 */

namespace Widgets;


use Abstracts\OutputCache;
use Components\Db;
use Helper\Exception;
use Tools\UploadManager;

/**
 * 小区块渲染组件，如果未指定{name}属性，{type}、{name}、{data}将从数据库依据 uniqueKey}在数据库中寻找
 * 一旦指定{name}，{type}、{name}、{data}将务必同时赋值，否则将抛出异常
 * Class Block
 * @package Widgets
 */
class Block extends OutputCache
{
    /**
     * 定义小区块常量
     */
    const TYPE_CONTENT = 'content';
    const TYPE_IMAGE_LINK = 'image-link';
    const TYPE_CLOUD_WORDS = 'cloud-words';
    const TYPE_CLOUD_WORDS_LINKS = 'cloud-words-links';
    const TYPE_LIST = 'list';
    const TYPE_LIST_LINKS = 'list-links';
    const TYPE_IMAGES = 'images';
    const TYPE_IMAGES_LINKS = 'images-links';


    /* @var string 小区块关键字 */
    public $uniqueKey;
    /* @var string 小区块类型 */
    public $type;
    /* @var string 小区块名称 */
    public $name;
    /* @var string 小区块数据 */
    public $data;
    /* @var array 小区块支持类型 */
    static public $types = [
        self::TYPE_CONTENT,
        self::TYPE_IMAGE_LINK,
        self::TYPE_CLOUD_WORDS,
        self::TYPE_CLOUD_WORDS_LINKS,
        self::TYPE_LIST,
        self::TYPE_LIST_LINKS,
        self::TYPE_IMAGES,
        self::TYPE_IMAGES_LINKS,
    ];

    /**
     * 在 @link init() 之前运行
     * @return string|array|mixed
     */
    protected function generateId()
    {
        return [
            '\Widgets\Block',
            $this->uniqueKey,
            $this->ttl,
        ];
    }

    /**
     * 获取数据库连接组件实例
     * @return Db
     * @throws Exception
     */
    protected function getDb()
    {
        return Db::getInstance([
            'c-file' => 'database',
            'c-group' => 'master',
        ]);
    }

    /**
     * 构建 cache-content ： 在 @link init() 之后运行
     * @throws \Exception
     */
    protected function generateContent()
    {
        if (empty($this->uniqueKey)) {
            throw new Exception('未指定小区块关键字', '104000101');
        }
        if ($this->name) {
            // 必须同时定义 {type}、{name}、{data}
            if (empty($this->type)) {
                throw new Exception('未指定小区块显示类型', '104000102');
            } else if (empty($this->data)) {
                throw new Exception('未指定小区块显示内容', '104000103');
            }
        } else {
            $category = $this->getDb()->getFindBuilder()
                ->setTable('pub_block_category')
                ->setSelect(['key', 'name', 'type', 'description', 'src', 'content'])
                ->addWhere('`key`=:key AND `is_enable`=:is_enable', [
                    ':key' => $this->uniqueKey,
                    ':is_enable' => 1,
                ])
                ->queryRow();
            if (empty($category)) {
                throw new Exception('未找到指定的小区块', '104000104');
            }
            $this->name = $category['name'];
            $this->type = $category['type'];
            if (!in_array($this->type, self::$types)) {
                throw new Exception('未知的小区块显示类型', '104000105');
            }
            if (self::TYPE_CONTENT == $this->type) {
                $this->data = $category['content'];
            } else if (self::TYPE_IMAGE_LINK == $this->type) {
                $data = [];
                if (empty($category['src'])) {
                    throw new Exception('没有上传图片', '104000106');
                }
                $data['src'] = UploadManager::getUrl('block') . $category['src'];
                if (!empty($category['content'])) {
                    $data['link'] = $this->getDisplayUrl($category['content']);;
                }
                $data['alt'] = $category['description'];
                $this->data = $data;
            } else {
                $data = $this->getDb()->getFindBuilder()
                    ->setTable('pub_block_option')
                    ->setSelect(['id', 'key', 'label', 'link', 'src', 'is_blank', 'description'])
                    ->addWhere('`key`=:key AND `is_enable`=:is_enable', [
                        ':key' => $this->uniqueKey,
                        ':is_enable' => 1,
                    ])
                    ->setOrder('`sort_order` ASC')
                    ->queryAll();

                // 图片地址处理
                if (in_array($category['type'], [self::TYPE_IMAGES, self::TYPE_IMAGES_LINKS])) {
                    foreach ($data as &$d) {
                        $d['src'] = UploadManager::getUrl('block') . $d['src'];
                    }
                    unset($d);
                }
                foreach ($data as &$d) {
                    if (!empty($d['link'])) {
                        $d['link'] = $this->getDisplayUrl($d['link']);
                    }
                }
                unset($d);
                $this->data = $data;
            }
        }
        $this->render('block', [
            'type' => $this->type,
            'name' => $this->name,
            'options' => $this->data,
        ]);
    }

    /**
     * 渲染小区块数据
     * @param string $url
     * @return string
     * @throws Exception
     */
    protected function getDisplayUrl($url)
    {
        if ('http' == substr($url, 0, 4) || 'https' == substr($url, 0, 5)) {
            return $url;
        }
        return $this->getApp()->getRequest()->getBaseUrl() . '/' . ltrim($url, '/');
    }
}