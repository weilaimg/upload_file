<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Upload extends CI_controller{


	public function __construct(){
		parent::__construct();
		$this -> load -> helper(array('form','url'));
	}

	public function index(){
		$this -> load -> view ('upload_file', array('error' => ' ' ));
	}


	public function do_upload(){

		$config['upload_path']      = '/Users/weilai/Sites/file/uploads';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     	= 100;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;
        $config['file_name']		= time().rand(1000,9999);

         $this->load->library('upload', $config);
         
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_file', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $file_name = $data['upload_data']['orig_name'];
            $array = array(
            	'file' => $file_name
            	);
            $this -> load -> model ('file_model','file');
            $this -> file -> input($array);

            $this->load->view('upload_success', $data);
        }
	}

	public function see(){
		//$this->load->library('image_lib');
		// $this -> load -> model('file_model','file');
		// $data1 = $this -> file -> output (1);
		// $file_url = base_url().'uploads/'.$data1['0']['file'];

		$arr['image_library'] = 'gd2';
		// $config['source_image'] = '/Users/weilai/Sites/file/uploads/14702246503126.png';
		// $config['create_thumb'] = FALSE;
		// $config['maintain_ratio'] = TRUE;
		// $config['width']     = 200;
		// $config['height']   = 200;

		// $this->load->library('image_lib', $config);

		//$this->image_lib->resize();

		$arr['source_image'] ='/Users/weilai/Sites/file/uploads/14702246503126.png';
			$arr['create_thumb'] = FALSE;
			$arr['maintain_ratio'] = FALSE;
			$arr['width'] = 200;
			$arr['height'] = 200;	

			//载入缩略图类
			$this->load->library('image_lib', $arr);
			//执行动作
			if ( ! $this->image_lib->resize())
{
    echo $this->image_lib->display_errors();
}


	}



















}