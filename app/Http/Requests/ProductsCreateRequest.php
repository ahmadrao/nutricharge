<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsCreateRequest extends FormRequest
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
        return [
            'title'                     => 'required',
            'details'                   => 'required',
            'description'               => 'required',
            'price'                     => 'required',
            'related_pics_ids'          => 'required',
            'related_video_links'       => 'required',
            'category_id'               => 'required',
            'photo_id'                  => 'required',
            'gender'                    => 'required',
            'age_range'                 => 'required',
            'selected_product_goals'    => 'required'
        ];
    }
}
