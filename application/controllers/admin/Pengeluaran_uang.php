<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_uang extends CI_Controller {

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
        $data['pengeluaran_uang'] = $this->m_model->get('tb_pengeluaran_uang')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/pengeluaran_uang');
		$this->load->view('admin/templates/footer');
    }

    public function insert()
    {
        $jumlah     = $_POST['jumlah'];
        $keterangan    = $_POST['keterangan'];
        $tanggal    = $_POST['tanggal'];

        $data = array(
            'jumlah'    => $jumlah,
            'keterangan'   => $keterangan,
            'tanggal'   => $tanggal
        );

        $this->m_model->insert($data, 'tb_pengeluaran_uang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('admin/pengeluaran_uang');
    }

    public function update()
    {
        $id       = $_POST['id'];
        $jumlah   = $_POST['jumlah'];
        $keterangan  = $_POST['keterangan'];
        $tanggal  = $_POST['tanggal'];

        $data = array(
            'jumlah'    => $jumlah,
            'keterangan'   => $keterangan,
            'tanggal'   => $tanggal
        );

        $where = array('id' => $id );

        $this->m_model->update($where, $data, 'tb_pengeluaran_uang');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
        redirect('admin/pengeluaran_uang');
    }

    public function delete($id)
    {
        $where = array('id' => $id );

        $this->m_model->delete($where, 'tb_pengeluaran_uang');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/pengeluaran_uang');
    }

    public function print()
    {
       $data['pengeluaran_uang'] = $this->m_model->get('tb_pengeluaran_uang')->result();
       $data['jumlah_pengeluaran_uang'] = $this->m_model->get('tb_pengeluaran_uang')->num_rows();
       $data['title'] = 'Cetak Pengeluaran Uang';

       $this->load->view('admin/cetakpengeluaranuang', $data);
    }
}