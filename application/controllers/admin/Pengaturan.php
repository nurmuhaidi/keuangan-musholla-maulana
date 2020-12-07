<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        }
    }

	public function index()
	{
        $data['title'] = 'Pengaturan';
        $data['pengaturan'] = $this->m_model->get('tb_pengaturan')->result();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/pengaturan', $data);
		$this->load->view('admin/templates/footer');
    }

    public function update()
    {
        $id             = $_POST['id'];
        $namaMusholla   = $_POST['namaMusholla'];
        $alamat         = $_POST['alamat'];
        $telp           = $_POST['telp'];

        $data = array(
            'namaMusholla'  => $namaMusholla,
            'alamat'        => $alamat,
            'telp'          => $telp
        );

        $where = array('id' => $id);

        $this->m_model->update($where, $data, 'tb_pengaturan');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
        redirect('admin/pengaturan');
    }
}