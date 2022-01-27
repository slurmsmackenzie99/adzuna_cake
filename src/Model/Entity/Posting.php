<?php
namespace App\Model\Entity;


use Cake\Collection\Collection;
use Cake\ORM\Entity;

class Posting extends Entity
{
    protected $_accessible = [
        'tag_string' => true,
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
    protected function _getTagString()
    {
        if (isset($this->_fields['tag_string'])) {
            return $this->_fields['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = new Collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->title . ', ';
        }, '');
        return trim($str, ', ');
    }
}
