<?php

class PaketwisataModel extends CI_Model
{
    public function semuaWisata()
    {
        $query = $this->db->get('paket_wisata');
        return $query->result_array();
    }
    public function cariWisata($keyword)
    {
        $this->db->like('nama_wisata', $keyword);
        $this->db->or_like('kategori_wisata', $keyword);
        $query = $this->db->get('paket_wisata');
        return $query->result_array();
    }
    public function wisataBySlug($slug)
    {
        $query = $this->db->get_where('paket_wisata',['slug' => $slug]);
        return $query->row_array();
    }
    public function wisataByKategori($kategori_wisata)
    {
        $query = $this->db->get_where('paket_wisata',['LOWER(kategori_wisata)' => str_replace('-', ' ', $kategori_wisata)]);
        return $query->result_array();
    }
    public function semuaKategori()
    {
        $this->db->select("DISTINCT(kategori_wisata) as kategori");
        $this->db->from('paket_wisata');
        return $this->db->get()->result_array();
    }
    public function wisataPopuler()
    {
        $this->db->select('w.*, (SELECT COUNT(p.id_wisata) FROM pesanan AS p WHERE p.id_wisata=w.id_wisata) AS jml_pesanan');
        $this->db->from('paket_wisata as w');
        $this->db->order_by('jml_pesanan','DESC');
        $this->db->limit(6);
        return $this->db->get()->result_array();
    }
    public function kategoriPopuler()
    {
        $this->db->select("DISTINCT(kategori_wisata) as kategori,COUNT(kategori_wisata) jml_kat");
        $this->db->from('paket_wisata');
        $this->db->group_by('kategori_wisata');
        $this->db->order_by('jml_kat', 'desc');
        $this->db->limit(3);
        return $this->db->get()->result_array();
    }
    public function wisataSerupa($id_wisata, $kategori = null)
    {
        $this->db->where_not_in('id_wisata',$id_wisata);
        if($kategori != null){
            $this->db->where('kategori_wisata',$kategori);
        }
        $this->db->limit(3);
        return $this->db->get('paket_wisata')->result_array();
    }
    public function wisataByHarga($harga)
    {
        $explode = explode(';', $harga);
        $hrg_awal = $explode[0];
        $hrg_akhir = $explode[1];

        $this->db->where('harga_wisata BETWEEN '.$hrg_awal.' AND '.$hrg_akhir);
        // $this->db->where('harga_wisata <=', $hrg_akhir);
        return $this->db->get('paket_wisata')->result_array();
    }
}