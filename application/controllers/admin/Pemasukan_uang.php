<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_uang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        }
    }

	public function index()
	{
		$data['title'] = 'Pemasukan Uang';
        $data['pemasukan_uang'] = $this->m_model->get('tb_pemasukan_uang')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/pemasukan_uang');
		$this->load->view('admin/templates/footer');
    }

    public function insert()
    {
        $jumlah     = $_POST['jumlah'];
        $donatur    = $_POST['donatur'];
        $tanggal    = $_POST['tanggal'];

        $data = array(
            'jumlah'    => $jumlah,
            'donatur'   => $donatur,
            'tanggal'   => $tanggal
        );

        $this->m_model->insert($data, 'tb_pemasukan_uang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('admin/pemasukan_uang');
    }

    public function update()
    {
        $id       = $_POST['id'];
        $jumlah   = $_POST['jumlah'];
        $donatur  = $_POST['donatur'];
        $tanggal  = $_POST['tanggal'];

        $data = array(
            'jumlah'    => $jumlah,
            'donatur'   => $donatur,
            'tanggal'   => $tanggal
        );

        $where = array('id' => $id );

        $this->m_model->update($where, $data, 'tb_pemasukan_uang');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
        redirect('admin/pemasukan_uang');
    }

    public function delete($id)
    {
        $where = array('id' => $id );

        $this->m_model->delete($where, 'tb_pemasukan_uang');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/pemasukan_uang');
    }

    public function print()
    {
       $data['pemasukan_uang'] = $this->m_model->get('tb_pemasukan_uang')->result();
       $data['jumlah_pemasukan_uang'] = $this->m_model->get('tb_pemasukan_uang')->num_rows();
       $data['title'] = 'Cetak Pemasukan Uang';

       $this->load->view('admin/cetakPemasukanUang', $data);
    }
}