<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'document_name' => 'required|max:50',
            'tags1' => 'required|max:50',
            'images' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
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

    public function UserID(): int
    {
        return $this->user()->id;
    }

    public function document(): string
    {
        return $this->input('document_name');
    }

    public function DocumentFile()
    {
        return $this->file('images');
    }

    public function tags(): array
    {
        if($this->input('tags1') != null && $this->input('tags2') == null && $this->input('tags3') == null && $this->input('tags4') == null){
            return $this->input('tags', ['tags1' => $this->input('tags1')]);
        }else if($this->input('tags1') != null && $this->input('tags2') != null && $this->input('tags3') == null && $this->input('tags4') == null){
            return $this->input('tags', ['tags1' => $this->input('tags1'), 'tags2' => $this->input('tags2')]);
        }else if($this->input('tags1') != null && $this->input('tags2') != null && $this->input('tags3') != null && $this->input('tags4') == null){
            return $this->input('tags', ['tags1' => $this->input('tags1'), 'tags2' => $this->input('tags2'), 'tags3' => $this->input('tags3')]);
        }else if($this->input('tags1') != null && $this->input('tags2') != null && $this->input('tags3') != null && $this->input('tags4') != null){
            return $this->input('tags', ['tags1' => $this->input('tags1'), 'tags2' => $this->input('tags2'), 'tags3' => $this->input('tags3'), 'tags4' => $this->input('tags4')]);
        }
    }
}
