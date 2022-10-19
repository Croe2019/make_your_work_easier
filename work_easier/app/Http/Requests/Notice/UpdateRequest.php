<?php

namespace App\Http\Requests\Notice;

use App\Models\Notice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required|max:2000',
            'images' => 'array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    // お知らせのidを取得
    public function id(): int
    {
        return (int) $this->route('notice_id');
    }

    public function input($key = null, $default = null)
    {
        return data_get(
            $this->getInputSource()->all() + $this->query->all(), $key, $default
        );
    }

    public function file($key = null, $default = null)
    {
        return data_get($this->allFiles(), $key, $default);
    }

    public function store($path, $options = [])
    {
        return $this->storeAs($path, $this->hashName(), $this->parseOptions($options));
    }

    public function NoticeID($notice_id): int
    {
        return $notice_id;
    }

    public function notice(): string
    {
        return $this->input('content');
    }

    public function images()
    {
        if($this->file('images1') != null && $this->file('images2') == null && $this->file('images3') == null && $this->file('images4') == null){
            return $this->file('images', ['images1' => $this->file('images1')]);
        }else if($this->file('images1') != null && $this->file('images2') != null && $this->file('images3') == null && $this->file('images4') == null){
            return $this->file('images', ['images1' => $this->file('images1'), 'images2' => $this->file('images2')]);
        }else if($this->file('images1') != null && $this->file('images2') != null && $this->file('images3') != null && $this->file('images4') == null){
            return $this->file('images', ['images1' => $this->file('images1'), 'images2' => $this->file('images2'), 'images3' => $this->file('images3')]);
        }else if($this->file('images1') != null && $this->file('images2') != null && $this->file('images3') != null && $this->file('images4') != null){
            return $this->file('images', ['images1' => $this->file('images1'), 'images2' => $this->file('images2'), 'images3' => $this->file('images3'), 'images4' => $this->file('images4')]);
        }

        if($this->file('images1') == null){
            return;
        }
    }
}
