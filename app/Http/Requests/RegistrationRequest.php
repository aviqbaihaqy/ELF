<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationRequest extends Request {

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
        $status_daftar = $this->get('status_daftar');

        return [
            'owner_id' => ($status_daftar == 'mahasiswa') ? 'required|exists:mahasiswa,nim' : 'required|exists:dosen,kode_dosen',
            'email'      => 'required|email|max:255|unique:users',
            'password'   => 'required|confirmed|min:6',
        ];
    }

}
