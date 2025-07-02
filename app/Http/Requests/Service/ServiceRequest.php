<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class ServiceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $serviceId = $this->route('service') ? $this->route('service')->id : null;
        return [
            'title' => 'required|string|max:50|unique:services,title,' . $serviceId,
            'content' => 'nullable|string|max:10000',
            'meta_description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }

    public function serviceFillData()
    {
        $data = [
            'title'    => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'content'      => $this->get('content'),
            'meta_description'      => $this->get('meta_description'),
            'icon'      => $this->get('icon'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0'
        ];

        if ($this->has('publish'))
        {
            $data['is_published'] = true;
        }

        return $data;
    }
}

