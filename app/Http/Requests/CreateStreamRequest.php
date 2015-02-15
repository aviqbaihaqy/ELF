<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStreamRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $type = $this->get('type');

        if ($type == 'tugas') {
            $rules = [
                'judul_tugas' => 'required',
                'deskripsi_tugas' => 'required',
                'batas_akhir' => 'required',
            ];
        } elseif ($type == 'pengumuman') {
            $rules =  [
                'content' => 'required'
            ];
        }

        return $rules;
    }

}
