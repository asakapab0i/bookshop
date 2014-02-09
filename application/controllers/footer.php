<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Footer Extends CI_Controller{

  public function aboutus(){

    //Prepare Header Data
    $header['page_title'] = 'Footer';

    //Navigation
    $navigation['page_cur_nav'] = 'account';

    //Main Content

    //Page Header
    $this->parser->parse('template/header', $header);
    //Page Nav
    $this->load->view('template/navigation', $navigation);
    //Page Main Content
    $this->load->view('footer/aboutus');
    //Page Footer
    $this->load->view('template/footer');

  }

  public function payment_method(){

    //Prepare Header Data
    $header['page_title'] = 'Footer';

    //Navigation
    $navigation['page_cur_nav'] = 'account';

    //Main Content

    //Page Header
    $this->parser->parse('template/header', $header);
    //Page Nav
    $this->load->view('template/navigation', $navigation);
    //Page Main Content
    $this->load->view('footer/payment_method');
    //Page Footer
    $this->load->view('template/footer');

  }

  public function private_policy(){

    //Prepare Header Data
    $header['page_title'] = 'Footer';

    //Navigation
    $navigation['page_cur_nav'] = 'account';

    //Main Content

    //Page Header
    $this->parser->parse('template/header', $header);
    //Page Nav
    $this->load->view('template/navigation', $navigation);
    //Page Main Content
    $this->load->view('footer/private_policy');
    //Page Footer
    $this->load->view('template/footer');



  }


  public function faq(){

    //Prepare Header Data
    $header['page_title'] = 'Footer';

    //Navigation
    $navigation['page_cur_nav'] = 'account';

    //Main Content

    //Page Header
    $this->parser->parse('template/header', $header);
    //Page Nav
    $this->load->view('template/navigation',$navigation);
    //Page Main Content
    $this->load->view('footer/faq');
    //Page Footer
    $this->load->view('template/footer');



  }

}

