<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'title' =>'required|string|min:3',
            'description' => 'required|string|max:500',
            'file' => 'nullable|file|mimetypes:video/mp4,video/mpeg,video/quicktime|max:20480',
        ];
    }
}
