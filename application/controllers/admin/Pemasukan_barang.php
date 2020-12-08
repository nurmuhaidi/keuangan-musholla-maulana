<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = 'Pemasukan Barang';
        $data['pemasukan_barang'] = $this->m_model->get('tb_pemasukan_barang')->result();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pemasukan_barang');
        $this->load->view('admin/templates/footer');
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Data';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambah_barang');
        $this->load->view('admin/templates/footer');
    }

	public function edit($id)
	{
        $data['id'] = $id;
		$data['title'] = 'Edit Data';
        $where = array('id' => $id );

        $data['pemasukan_barang'] = $this->m_model->get_where($where, 'tb_pemasukan_barang')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/edit_barang');
		$this->load->view('admin/templates/footer');
    }

    public function insert()
    {
        $namaBarang    = $_POST['namaBarang'];
        $donatur       = $_POST['donatur'];
        $tanggal       = $_POST['tanggal'];

        $data = array(
            'namaBarang'    => $namaBarang,
            'donatur'       => $donatur,
            'tanggal'       => $tanggal
        );

        $this->m_model->insert($data, 'tb_pemasukan_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('admin/pemasukan_barang');
    }

    public function update()
    {
        $id             = $_POST['id'];
        $namaBarang     = $_POST['namaBarang'];
        $donatur        = $_POST['donatur'];
        $tanggal        = $_POST['tanggal'];

        $data = array(
            'namaBarang'    => $namaBarang,
            'donatur'       => $donatur,
            'tanggal'       => $tanggal
        );

        $where = array('id' => $id );

        $this->m_model->update($where, $data, 'tb_pemasukan_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
        redirect('admin/pemasukan_barang');
    }

    public function delete($id)
    {
        $where = array('id' => $id );

        $this->m_model->delete($where, 'tb_pemasukan_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/pemasukan_barang');
    }

    public function print()
    {
        $tgl_awal   = $_POST['tgl_awal'];
        $tgl_akhir  = $_POST['tgl_akhir'];

        $data['title'] = 'Cetak Pemasukan Barang';
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['pemasukan_barang'] = $this->db->query('SELECT * FROM tb_pemasukan_barang WHERE tanggal BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'" ')->result();
        $data['jumlah_pemasukan_barang'] = $this->db->query('SELECT id FROM tb_pemasukan_barang WHERE tanggal BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'" ')->num_rows();
        
        $this->load->view('admin/cetakPemasukanBarang', $data);
    }
}