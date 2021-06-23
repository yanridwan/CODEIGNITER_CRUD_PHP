<?php
class AdminModel extends CI_Model
{
    public function select($tabel)
    {
        $select = $this->db->get($tabel);
        return $select->result();
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function update($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id)
    {
        $this->db->where($id);
        $this->db->delete($tabel);
    }
}
