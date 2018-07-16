<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('global_model');
        $this->load->model('student_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $page = $this->uri->segment(USER_ROLE);
        $header['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $content['site'] = $this->global_model->get_where('site', array('slug'=>$page, 'locale'=> $_COOKIE['locale']));
        $header['page_title']   = $content['site'][0]['title'];
        $this->load->view('main/header', $header);
        $this->load->view('site/main', $content);
        $this->load->view('main/footer', $header);
	}

    public function downloadResume(){
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        $this->load->library('Pdf');
        $page = base64_decode($this->uri->segment(2));
        
        $candidate = $this->student_model->get_user_profile($page);
        $candidate['link'] = 'www.xremo.com/download/'.$page;


        // $html = $this->load->view('print/print-v1', $data, true);

        // $style1 = file_get_contents('https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700');
        // $style1 .= file_get_contents('https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all');
        $style1 = file_get_contents(CSS.'bootstrap/bootstrap.min.css');
        $style2 = file_get_contents(CSS.'bootstrap/bootstrap-switch.min.css');
        $style3 = str_replace('fonts/fontawesome-webfont.woff2',base_url().'assets/fonts/fontawesome-webfont.woff2',file_get_contents(CSS.'icon/font-awesome.min.css'));
        $style4 = file_get_contents(CSS.'global/components.min.css');
        
        $html = '<style>'.$style3.'</style>
                        <style>
                            p, h1, h2, h3, h4, h5, h6 {
                                font-family: "Open Sans",sans-serif;
                            }
                            article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
                                display: block;
                            }
                            *, :after, :before {
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                box-sizing: border-box;
                            }
                            .m-grid {
                                table-layout: fixed;
                                display: table;
                                width: 100%;
                            }
                            .m-grid .m-grid-col:not(.m-grid-col-middle):not(.m-grid-col-bottom) {
                                vertical-align: top;
                            }
                            .m-grid .m-grid-col {
                                text-align: left;
                                vertical-align: top;
                                display: table-cell;
                            }
                            .m-grid-col-xs-2 {
                                width: 16.66667%;
                            }
                            .md-amber-text {
                                color: #FFC107!important;
                            }
                            a, button, code, div, img, input, label, li, p, pre, select, span, svg, table, td, textarea, th, ul {
                                -webkit-border-radius: 0!important;
                                -moz-border-radius: 0!important;
                                border-radius: 0!important;
                            }
                        </style>
        <section style="-webkit-font-smoothing: antialiased;width: 21cm;min-height: 29.7cm;font-size: 15px;line-height: 1.6;background-color: #fff;">
            <div style="table-layout: fixed;display: table;width: 100%;height: 100%;position: static;display: table-row;">
                <div style="display: table-row;">
                    <div style="vertical-align: top;text-align: center;display: table-cell;background-color: #2B3643!important;height: 100%!important;padding: 1.25rem!important;width: 33.33333%;border-radius: 0!important;">

                        <!-- # PROFILE IMAGE -->
                        <img src="'.base_url().'/assets/global/img/xremo/profile-pic.png" style="width: 126px!important;height: 126px!important;-webkit-border-radius: 50%!important;-moz-border-radius: 50%!important;border-radius: 50%!important;-o-object-fit: cover;object-fit: cover;margin-bottom: .9375rem!important;vertical-align: middle;border: 0;text-align: center;" alt="">

                        <!-- # FULL NAME -->
                        <h5 style="color: #FFC107!important;font-size: 1.0625em!important;letter-spacing: .8px;margin-top: .9375rem!important;text-transform: uppercase;font-family: "Open Sans",sans-serif;font-weight: 400;margin-bottom: 10px;line-height: 1.1;display: block;-webkit-margin-before: 1.67em;-webkit-margin-after: 1.67em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;">'.(!empty($candidate['overview']['name']) ? $candidate['overview']['name'] : 'N/A').'</h5>
                        <hr style="border-color: rgba(255,255,255,.8)!important;margin-bottom: .9375rem!important;margin-top: .9375rem!important;border-style: dashed!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;display: block;unicode-bidi: isolate;-webkit-margin-before: 0.5em;-webkit-margin-after: 0.5em;-webkit-margin-start: auto;-webkit-margin-end: auto;overflow: hidden;">

                        <!-- # CONTACT -->
                        <div style="margin-top: 0;padding: 0;margin-bottom: .9375rem!important;border-radius: 0!important;">
                            <ul style="padding-left: .3125rem!important;padding-right: .3125rem!important;list-style: none;border-radius: 0!important;margin-bottom: 10px;margin-top: 0;display: block;-webkit-margin-before: 1em;-webkit-margin-after: 1em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;-webkit-padding-start: 40px;font-family: Open Sans,sans-serif;">
                                <!-- Phone -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-phone md-amber-text "></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small style="color: rgba(255,255,255,.8)!important;font-size: .75em!important;">'.(!empty($candidate['overview']['student_bios_contact_number']) ? $candidate['overview']['student_bios_contact_number'] : 'N/A').'</small>
                                    </div>
                                </li>

                                <!-- Email -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-envelope md-amber-text"></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small style="color: rgba(255,255,255,.8)!important;font-size: .75em!important;">'.(!empty($candidate['overview']['email']) ? $candidate['overview']['email'] : 'N/A').'</small>
                                    </div>
                                </li>

                                <!-- location -->
                                <!-- Please put city and state -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-map-marker md-amber-text "></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small style="color: rgba(255,255,255,.8)!important;font-size: .75em!important;">'.(!empty($candidate['address']['states']) ? $candidate['address']['states'] : 'N/A').', '.(!empty($candidate['address']['city']) ? $candidate['address']['city'] : 'N/A').'</small>
                                    </div>
                                </li>

                                <!-- Link -->
                                <!-- Please extract link to user digital resume based from our site -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-link md-amber-text"></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small style="color: rgba(255,255,255,.8)!important;font-size: .75em!important;">'.$candidate['link'].'</small>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- # LANGUAGE -->
                        <div style="margin-top: 0;padding: 0;margin-bottom: .9375rem!important;text-align: left;">
                            <!-- Title -->
                            <h6 style="color: #FFC107!important;font-size: .9375em!important;letter-spacing: .8px;margin-bottom: 0!important;text-transform: uppercase;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;text-align: left;">Language</h6>
                            <hr style="border-color: rgba(255,255,255,.8)!important;margin-bottom: .9375rem!important;margin-top: .9375rem!important;border-style: dashed!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;display: block;unicode-bidi: isolate;-webkit-margin-before: 0.5em;-webkit-margin-after: 0.5em;-webkit-margin-start: auto;-webkit-margin-end: auto;overflow: hidden;border-style: inset;border-width: 1px;">
                            <!-- Content -->
                            <ul style="padding-left: .3125rem!important;padding-right: .3125rem!important;list-style: none;margin-bottom: 10px;margin-top: 0;display: block;-webkit-margin-before: 1em;-webkit-margin-after: 1em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;-webkit-padding-start: 40px;">';

                                if (!empty($candidate['language']))
                                {
                                    foreach ($candidate['language'] as $value)
                                    {
                                        $html .= '<li style="page-break-inside: avoid;font-weight: 400;color: #242424;padding-bottom: 0.25rem !important;-moz-border-radius: 0 !important;-webkit-border-radius: 0 !important;border-radius: 0 !important;box-sizing: border-box;display: list-item;text-align: -webkit-match-parent;">
                                                    <h6 style="color: #FFC107!important;font-size: .8125em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;">'.$value['title'].'</h6>
                                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;border-radius: 0!important;font-family: Open Sans,sans-serif;margin: 20px 0;display: block;-webkit-margin-before: 1em;-webkit-margin-after: 1em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;">Spoken
                                                        <i class="fa fa-caret-right"></i> '.$value['spoken'].' </p>
                                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;    margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;display: block;-webkit-margin-before: 1em;-webkit-margin-after: 1em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;font-weight: 400;text-align: -webkit-match-parent;">Written
                                                        <i class="fa fa-caret-right"></i> '.$value['written'].' </p>
                                                </li>';
                                    }
                                }

                            $html .= '
                            </ul>
                        </div>

                        <!-- # SKILL -->
                        <div style="border-radius: 4px;margin-top: 0;margin-bottom: 25px;padding: 0;-webkit-border-radius: 4px;-moz-border-radius: 4px;margin-bottom: .9375rem!important;text-align: left;display: block;">
                            <!-- Title -->
                            <h6 style="color: #FFC107!important;font-size: .9375em!important;letter-spacing: .8px;margin-bottom: 0!important;text-transform: uppercase;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;text-align: left;">Skill</h6>
                            <hr style="border-color: rgba(255,255,255,.8)!important;margin-bottom: .9375rem!important;margin-top: .9375rem!important;border-style: dashed!important;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;border-width: 1px;display: block;unicode-bidi: isolate;-webkit-margin-before: 0.5em;-webkit-margin-after: 0.5em;-webkit-margin-start: auto;-webkit-margin-end: auto;overflow: hidden;    border-style: inset;">
                            <!-- Content -->
                            <ul style="padding-left: 0;list-style: none;-webkit-border-radius: 0!important;-moz-border-radius: 0!important;border-radius: 0!important;">
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin: 20px 0;"> <i class="fa fa-caret-right md-amber-text " style="width: 1.25em;"></i>Campaign Management</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"> <i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Brand Management </p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"> <i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Business (Marketing) Strategy</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"> <i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Channel Management</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"><i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Budgeting and Planning</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"><i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Graphic Design</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"><i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Marketing Communications</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"><i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>Business Development</p>
                                </li>
                                <li style="padding-bottom: .125rem!important;display: list-item;text-align: -webkit-match-parent;padding-left: 0;list-style: none;">
                                    <p style="color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: 0!important;margin-top: 0;"><i class="fa fa-caret-right md-amber-text" style="width: 1.25em;"></i>International Business</p>
                                </li>
                            </ul>
                        </div>

                        <!-- # REFERENCES -->
                        <div style="border-radius: 4px;margin-top: 0;margin-bottom: 25px;padding: 0;-webkit-border-radius: 4px;-moz-border-radius: 4px;margin-bottom: 0!important;text-align: left;">
                            <!-- Title -->
                            <h6 style="color: #FFC107!important;font-size: .9375em!important;letter-spacing: .8px;margin-bottom: 0!important;text-transform: uppercase;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;text-align: left;">References</h6>
                            <hr style="border-color: rgba(255,255,255,.8)!important;margin-bottom: .9375rem!important;margin-top: .9375rem!important;border-style: dashed!important;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;border-width: 1px;display: block;unicode-bidi: isolate;-webkit-margin-before: 0.5em;-webkit-margin-after: 0.5em;-webkit-margin-start: auto;-webkit-margin-end: auto;overflow: hidden;    border-style: inset;">
                            <!-- 
                                CONTENT
                                Note : Attribute involve is Name of Referer , Relationship , Contact No , Email Address  
                                IF "Email Address " do not exist or null , hide it from resume
                            -->
                            <ul style="padding-left: .3125rem!important;padding-right: .3125rem!important;padding-left: 0;list-style: none;margin-bottom: 10px;margin-top: 0;display: block;list-style-type: disc;-webkit-margin-before: 1em;-webkit-margin-after: 1em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;-webkit-padding-start: 40px;">
                                <li style="list-style: none;padding-top: 0.25rem !important;padding-bottom: 0.25rem !important;">
                                    <h6 style="color: #FFC107!important;font-size: .8125em!important;margin-bottom: .3125rem!important;margin-top: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;">Roy Goh</h6>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;">Former margin: 20px 0;Peer </p>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;margin: 20px 0;"> +6012 213 6043 </p>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;margin: 20px 0;"> roy_goh@email.com </p>
                                </li>
                                <li style="list-style: none;padding-top: 0.25rem !important;padding-bottom: 0.25rem !important;">
                                    <h6 style="color: #FFC107!important;font-size: .8125em!important;margin-bottom: .3125rem!important;margin-top: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;">James Wu</h6>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;">Former margin: 20px 0;Peer </p>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;margin: 20px 0;"> +6011 3229 5016 </p>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;margin: 20px 0;"> james.wu@email.com </p>
                                </li>
                                <li style="list-style: none;padding-top: 0.25rem !important;padding-bottom: 0.25rem !important;">
                                    <h6 style="color: #FFC107!important;font-size: .8125em!important;margin-bottom: .3125rem!important;margin-top: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;line-height: 1.1;display: block;-webkit-margin-before: 2.33em;-webkit-margin-after: 2.33em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;">Christine Lee </h6>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;">Former margin: 20px 0;Manager </p>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;margin: 20px 0;"> +6012 699 9768 </p>
                                    <p style="margin-top: 0!important;color: rgba(255,255,255,.7)!important;font-size: .75em!important;letter-spacing: .5px;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;margin: 20px 0;"> Christine.L@email.com </p>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div style="padding: 1.25rem!important;width: 66.66667%;">
                        <!-- # About Me @ Profile-->
                        <div style="margin-top: 0!important;margin: 0!important;padding: 0!important;margin-left: -15px;margin-right: -15px;-webkit-border-radius: 0!important;-moz-border-radius: 0!important;border-radius: 0!important;">
                            <!-- Title -->
                            <div style="table-layout: fixed;display: table;width: 100%;margin-top: 0!important;">
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                                <h6 style="color: #2B3643!important;font-weight: 700!important;font-size: .9375em!important;letter-spacing: 1px;margin-bottom: 8!important;text-transform: uppercase;text-align: center;">About Me</h6>
                                <hr style="border-color: rgba(255, 193, 7, 0.7) !important;margin-top: 0.625rem !important;margin-bottom: 0rem !important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                            </div>
                            <!-- Description -->
                            <p style="color: #212121!important;font-size: .75em!important;padding-left: .3125rem!important;padding-right: .3125rem!important;margin-top: .625rem!important;line-height: 1.2!important;text-align: justify;margin: 20px 0;">
                                Currently managing two brands under the same management. Experienced Marketing Manager with a demonstrated history of working in the telecommunications industry. Skilled in Strategic Brand Positioning, Creative Concept Design, Campaign Management, Brand Management, and Business (Marketing) Strategy. Strong marketing professional graduated from In-House Multimedia College and further my study at INTI International University.
                            </p>
                        </div>

                        <!-- # Education -->
                        <!-- Note arrangement of each point is the latest one on top -->
                        <!-- Limit 4 [Select latest one on top] -->
                        <div style="margin-bottom: .9375rem!important;margin: 0!important;padding: 0!important;margin-left: -15px;margin-right: -15px;">
                            <!-- Title -->
                            <div style="table-layout: fixed;display: table;width: 100%;">
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                                <h6 style="color: #2B3643!important;font-weight: 700!important;font-size: .9375em!important;letter-spacing: 1px;margin-bottom: 8!important;text-transform: uppercase;text-align: center;">Education</h6>
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                            </div>
                            <!-- Content -->
                            <ul style="padding-left: .3125rem!important;padding-right: .3125rem!important;margin-top: .625rem!important;list-style: none;margin-bottom: 10px;font-family: Open Sans,sans-serif;">
                                <li class="m-grid ">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;"> Present
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            June 2016
                                        </small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Diploma in Art / Design / Creative Multimedia</h5>
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">INTI International University</h6>
                                    </div>
                                </li>
                                <li class="m-grid ">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;"> Dec 2015
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Jan 2011
                                        </small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Diploma in Art / Design / Creative Multimedia</h5>
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">In-House Multimedia Training College</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- # Experience -->
                        <!-- Note arrangement of each point is the latest one on top -->
                        <div style="margin-bottom: .9375rem!important;margin: 0!important;padding: 0!important;margin-left: -15px;margin-right: -15px;">
                            <!-- Title -->
                            <div style="table-layout: fixed;display: table;width: 100%;">
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                                <h6 style="color: #2B3643!important;font-weight: 700!important;font-size: .9375em!important;letter-spacing: 1px;margin-bottom: 8!important;text-transform: uppercase;text-align: center;">Experience</h6>
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                            </div>

                            <!-- Content -->
                            <ul style="padding-left: .3125rem!important;padding-right: .3125rem!important;margin-top: .625rem!important;list-style: none;margin-bottom: 10px;font-family: Open Sans,sans-serif;">
                                <li class="m-grid">
                                    <!-- END Date Joined - START Date Joined -->
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <!-- @ ATTR : Display Month and Year  -->
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;">
                                            Present
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Jan 2015
                                        </small>
                                    </div>
                                    <!-- Content -->
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <!-- @ ATTR : Job Position Title -->
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Marketing Manager</h5>
                                        <!-- @ ATTR : Company Name -->
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">
                                            <i>Elabram Systems Sdn Bhd</i>
                                        </h6>
                                        <!-- @ ATTR : Description -->
                                        <p style="font-size: .75em!important;margin-bottom: 0!important;line-height: 1.2!important;text-align: justify;font-family: Open Sans,sans-serif;margin: 20px 0;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>

                                    </div>
                                </li>
                                <li class="m-grid">
                                    <!-- Start Date Joined - End Date Joined -->
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <!-- @ ATTR : Display Month and Year  -->
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;">Jan 2015
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Jan 2012
                                        </small>
                                    </div>
                                    <!-- Content -->
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <!-- @ ATTR : Job Position Title -->
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Marketing Management Consultant</h5>
                                        <!-- @ ATTR : Company Name -->
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">
                                            <i>Business Owner</i>
                                        </h6>
                                        <!-- @ ATTR : Description -->
                                        <p style="font-size: .75em!important;margin-bottom: 0!important;line-height: 1.2!important;text-align: justify;font-family: Open Sans,sans-serif;margin: 20px 0;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>
                                </li>
                                <li class="m-grid">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;"> Dec 2011
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span> Aug 2008</small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Art Director + Asst Brand Manager</h5>
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">
                                            <i>Bonia Bhd</i>
                                        </h6>
                                        <p style="font-size: .75em!important;margin-bottom: 0!important;line-height: 1.2!important;text-align: justify;font-family: Open Sans,sans-serif;margin: 20px 0;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>

                                </li>
                                <li class="m-grid">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;">
                                            Jun 2008
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Dec 2005</small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Marketing and Communications</h5>
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">
                                            <i>Sports Planet Sdn Bhd</i>
                                        </h6>
                                        <p style="font-size: .75em!important;margin-bottom: 0!important;line-height: 1.2!important;text-align: justify;font-family: Open Sans,sans-serif;margin: 20px 0;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>
                                </li>
                                <li class="m-grid">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;">Oct 2005
                                            <span style="height: .625rem!important;display: block;">
                                                <i class="fa fa-minus font-12"></i>
                                            </span> May 2002</small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="color: #2B3643!important;font-size: .875em!important;margin-bottom: .3125rem!important;font-family: Open Sans,sans-serif;font-weight: 400;margin-top: 10px;line-height: 1.1;">Visual Merchandise / Graphic Designer</h5>
                                        <h6 style="color: #424242!important;font-weight: 400!important;font-size: .8125em!important;margin-bottom: 0!important;font-family: Open Sans,sans-serif;margin-top: 10px;line-height: 1.1;">
                                            <i>OSIM (M) Sdn Bhd</i>
                                        </h6>
                                        <p style="font-size: .75em!important;margin-bottom: 0!important;line-height: 1.2!important;text-align: justify;font-family: Open Sans,sans-serif;margin: 20px 0;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- # Non Education [Optional] -->
                        <!-- Note arrangement of each point is the latest one on top -->
                        <div class="row no-space  ">
                            <!-- Title -->
                            <div style="table-layout: fixed;display: table;width: 100%;">
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                                <h6 style="color: #2B3643!important;font-weight: 700!important;font-size: .9375em!important;letter-spacing: 1px;margin-bottom: 8!important;text-transform: uppercase;text-align: center;">Extracurricular Activity</h6>
                                <hr style="border-color: rgba(255,193,7,.7)!important;margin-bottom: .625rem!important;margin-top: 0!important;border: 0;border-top: 0;border-bottom: 1px solid #EEE;margin: 20px 0;box-sizing: content-box;height: 0;">
                            </div>
                            <!-- Content -->
                            <ul style="padding-left: .3125rem!important;padding-right: .3125rem!important;margin-top: .625rem!important;list-style: none;margin-bottom: 10px;font-family: Open Sans,sans-serif;">
                                <li class="m-grid">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;">Nov 2012</small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="font-size: .8125em!important;margin-bottom: 0!important;margin-top: 0!important;font-family: Open Sans,sans-serif;font-weight: 400;line-height: 1.1;color: inherit;">Title Event</h5>
                                    </div>
                                </li>
                                <li class="m-grid">
                                    <div style="text-align: center;vertical-align: middle;display: table-cell;border-color: rgba(158,158,158,.3)!important;background-color: rgba(227,242,253,.3)!important;padding: .625rem!important;width: 25%;border-width: 2px!important;border-right: 1px solid;border-left: none;border-top: none;border-bottom: none;">
                                        <small style="color: rgba(43,54,67,.7)!important;font-weight: 600!important;font-size: .75em!important;line-height: .7!important;">
                                            Nov 2012</small>
                                    </div>
                                    <div style="vertical-align: middle;text-align: left;display: table-cell;padding: .625rem!important;width: 75%;">
                                        <h5 style="font-size: .8125em!important;margin-bottom: 0!important;margin-top: 0!important;font-family: Open Sans,sans-serif;font-weight: 400;line-height: 1.1;color: inherit;">Title Event</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
        var_dump($html);exit();

        $pdfFilePath = $page.".pdf";

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->AddPage();
        // $pdf->writeHTML($style1, true, false, true, false, '');
        // $pdf->writeHTML($style2, true, false, true, false, '');
        // $pdf->writeHTML($style3, true, false, true, false, '');
        // $pdf->writeHTML($html, true, false, true, false, '');
        $y = $pdf->getY();

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output($pdfFilePath, "I");

        // $stylesheet = file_get_contents(base_url().'/assets/css/bootstrap/bootstrap.min.css');
        // $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        // $this->m_pdf->pdf->WriteHTML($html);
        // $this->m_pdf->pdf->Output($pdfFilePath, "D");  

    }

}