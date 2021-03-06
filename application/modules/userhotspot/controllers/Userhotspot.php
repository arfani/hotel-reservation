<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Userhotspot extends CI_Controller {

  function index(){
    isOp();

    if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/user/getall');
      $users = $this->mtikapi->read();
      $this->mtikapi->disconnect();
    } else {
      ?>
      <script>
        alert('Please connect to MikroTik Server!')
      </script>
      <?php
    }

    $data = array(
      'content' => 'userhotspot',
      'users'   => $users
      );
      $this->load->view('home/home', $data);
    }

    function removeUserInDb($username){
      $this->db->where('username', $username);
      $this->db->delete('voucher');
    }

    function remove(){
      $id = $this->input->post('id');
      $uname = $this->input->post('uname');
      if($this->mtikapi->connect($this->session->hostname,$this->session->username,$this->session->password)){
      $this->mtikapi->write('/ip/hotspot/user/remove', false);
      $this->mtikapi->write('=.id='.$id);
      $this->mtikapi->read();
      $this->mtikapi->disconnect();
      //also remove in db
      $this->removeUserInDb($uname);
      } else {
      echo 'disconnect';
      }
    }


}
