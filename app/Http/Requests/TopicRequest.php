<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            case 'PUT':
            case 'PATCH': {
                    return [
                        'title' => 'required|min:2',
                        'body' => 'required|min:3',
                        'category_id' => 'required|numeric',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default: {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题 必须至少两个字符',
            'body.min' => '文章内容 必须至少三个字符',
        ];
    }
}
