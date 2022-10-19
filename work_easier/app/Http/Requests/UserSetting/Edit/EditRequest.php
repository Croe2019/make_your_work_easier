<?php

namespace App\Http\Requests\UserSetting\Edit;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => 'required|max:50',
            'user_status' => 'required',
            'user_image.*' => 'image|mimes:jpeg,png,jpg,gif,pdf|max:2048'
        ];
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

    public function UserID($user_id)
    {
        return $user_id;
    }

    public function UserName(): string
    {
        return $this->input('name');
    }

    public function UserStatus(): int
    {
        return $this->input('user_status');
    }

    public function UserImage()
    {
        return $this->file('user_image');
    }
}
