<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->library('session'); // pastikan session diload
    }

    public function index()
    {
        $data['events'] = $this->Event_model->get_all();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('event', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        if ($this->input->post()) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; // 2MB

            $this->load->library('upload', $config);

            $gambar = null;
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }

            $data = [
                'judul'         => $this->input->post('judul'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'tanggal_event' => $this->input->post('tanggal_event'),
                'lokasi'        => $this->input->post('lokasi'),
                'harga'         => $this->input->post('harga'),
                'gambar'        => $gambar
            ];

            if ($this->Event_model->insert($data)) {
                $this->session->set_flashdata('success', 'Event berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Event gagal ditambahkan!');
            }
        }
        redirect('event');
    }


    public function edit($id)
    {
        $event = $this->Event_model->get_by_id($id);

        if ($this->input->post()) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);

            $gambar = $event->gambar; // default gambar lama
            if ($this->upload->do_upload('gambar')) {
                // hapus file lama kalau ada
                if ($event->gambar && file_exists('./uploads/' . $event->gambar)) {
                    unlink('./uploads/' . $event->gambar);
                }
                $gambar = $this->upload->data('file_name');
            }

            $update = [
                'judul'         => $this->input->post('judul'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'tanggal_event' => $this->input->post('tanggal_event'),
                'lokasi'        => $this->input->post('lokasi'),
                'harga'         => $this->input->post('harga'),
                'gambar'        => $gambar
            ];

            if ($this->Event_model->update($id, $update)) {
                $this->session->set_flashdata('success', 'Event berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Event gagal diperbarui!');
            }
            redirect('event');
        }

        $this->load->view('event/edit', ['event' => $event]);
    }


    public function delete($id)
    {
        if ($this->Event_model->delete($id)) {
            $this->session->set_flashdata('success', 'Event berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Event gagal dihapus!');
        }
        redirect('event');
    }
}
