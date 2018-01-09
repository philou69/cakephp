<?php


class Chapter extends AppModel
{
    public $validate = [
        'title' => [
            'rule' => 'notBlank'
        ],
        'chapter' => [
            'rule' => 'notBlank'
        ]
    ];
}