<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class End extends BaseController
{
	public function index()
	{
		$data['title'] = 'Survei Kepuasan Sekolah Vokasi IPB';
		return view('User/end_survei', $data);
	}
}
