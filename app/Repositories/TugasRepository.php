<?php
/**
 * Created by Fahri Baharudin.
 * Email: fahrybaharudin@gmail.com
 * Date: 2/16/2015
 * Time: 2:08 AM
 */
namespace App\Repositories;
use App\Tugas;

class TugasRepository {

    public function findById($tugas_id) {
        return Tugas::where('id', '=', $tugas_id)->first();
    }
}