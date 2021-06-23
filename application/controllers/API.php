<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $data['barang'] = $this->AdminModel->select('barang');
        $this->load->view('index', $data);
    }

    public function tambah()
    {
        $data = array(
            'barang_nama' => $this->input->post('nama_barang'),
            'barang_harga' => $this->input->post('harga_barang'),
        );

        $this->AdminModel->insert('barang', $data);
        redirect('API/index');
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('API/index');
        } else {
            $this->db->where('barang_id', $id);
            $this->db->delete('barang');
            redirect('API/index');
        }
    }

    public function edit()
    {
        $data = array(
            'barang_nama' => $this->input->post('nama_barang'),
            'barang_harga' => $this->input->post('harga_barang'),
        );

        $where = array(
            'barang_id' => $this->input->post('barang_id'),
        );

        $this->AdminModel->update('barang', $where, $data);
        redirect('API/index');
    }
}
