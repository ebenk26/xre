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
        $this->load->library('Pdf');
        $page = base64_decode($this->uri->segment(2));
        
        $candidate = $this->student_model->get_user_profile($page);
        $candidate['link'] = 'www.xremo.com/download/'.$page;


        // $html = $this->load->view('print/print-v1', $data, true);

        $style1 = file_get_contents('https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700');
        $style1 .= file_get_contents('https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all');
        $style1 .= file_get_contents(CSS.'bootstrap/bootstrap.min.css');
        $style2 = file_get_contents(CSS.'bootstrap/bootstrap-switch.min.css');
        $style3 = str_replace('fonts/fontawesome-webfont.woff2',base_url().'assets/fonts/fontawesome-webfont.woff2',file_get_contents(CSS.'icon/font-awesome.min.css'));
        $style4 = file_get_contents(CSS.'global/components.min.css');
        
        $html = '<style>'.$style1.$style2.$style3.$style4.'</style>
        <section class="page-resume">
            <div class="m-grid m-grid-full-height ">
                <div class="m-grid-row">
                    <div class="m-grid-col m-grid-col-xs-4 m-grid-col-center p-20 md-darkblue full-height-content height-100-percent">

                        <!-- # PROFILE IMAGE -->
                        <img src="'.base_url().'/assets/global/img/xremo/profile-pic.png" class="avatar avatar-medium avatar-circle mb-15 " alt="">

                        <!-- # FULL NAME -->
                        <h5 class="text-uppercase font-17 md-amber-text letter-space-xs mt-15 ">'.(!empty($candidate['overview']['name']) ? $candidate['overview']['name'] : 'N/A').'</h5>
                        <hr class="border-dash border-mdo-white-v8 my-15">

                        <!-- # CONTACT -->
                        <div class="portlet portlet-body mb-15 ">
                            <ul class="list-unstyled px-5 ">
                                <!-- Phone -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-phone md-amber-text "></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small class="mdo-white-v8-text font-12">'.(!empty($candidate['overview']['student_bios_contact_number']) ? $candidate['overview']['student_bios_contact_number'] : 'N/A').'</small>
                                    </div>
                                </li>

                                <!-- Email -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-envelope md-amber-text"></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small class="mdo-white-v8-text font-12 text-break">'.(!empty($candidate['overview']['email']) ? $candidate['overview']['email'] : 'N/A').'</small>
                                    </div>
                                </li>

                                <!-- location -->
                                <!-- Please put city and state -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-map-marker md-amber-text "></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small class="mdo-white-v8-text text-break font-12">'.(!empty($candidate['address']['states']) ? $candidate['address']['states'] : 'N/A').', '.(!empty($candidate['address']['city']) ? $candidate['address']['city'] : 'N/A').'</small>
                                    </div>
                                </li>

                                <!-- Link -->
                                <!-- Please extract link to user digital resume based from our site -->
                                <li class="m-grid">
                                    <div class="m-grid-col-xs-2 m-grid-col">
                                        <i class="fa fa-link md-amber-text"></i>
                                    </div>
                                    <div class="m-grid-col-xs-10 m-grid-col">
                                        <small class="mdo-white-v8-text text-break font-12">'.$candidate['link'].'</small>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- # LANGUAGE -->
                        <div class="portlet portlet-body text-left mb-15">
                            <!-- Title -->
                            <h6 class=" text-uppercase font-15 md-amber-text mb-0 letter-space-xs title-resume">Language</h6>
                            <hr class="border-dash border-mdo-white-v8 my-15">
                            <!-- Content -->
                            <ul class="list-unstyled mt-ul-li-tb-4 px-5">';

                                if (!empty($candidate['language']))
                                {
                                    foreach ($candidate['language'] as $value)
                                    {
                                        $html .= '<li>
                                                    <h6 class="md-amber-text font-13 mb-5">'.$value['title'].'</h6>
                                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Spoken
                                                        <i class="fa fa-caret-right"></i> '.$value['spoken'].' </p>
                                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Written
                                                        <i class="fa fa-caret-right"></i> '.$value['written'].' </p>
                                                </li>';
                                    }
                                }

                            $html .= '
                            </ul>
                        </div>

                        <!-- # SKILL -->
                        <div class="portlet portlet-body text-left mb-15">
                            <!-- Title -->
                            <h6 class=" text-uppercase font-15 md-amber-text mb-0 letter-space-xs title-resume">Skill</h6>
                            <hr class="border-dash border-mdo-white-v8 my-15 ">
                            <!-- Content -->
                            <ul class="list-unstyled mt-ul-li-tb-2 ">
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0 "> <i class="fa fa-caret-right md-amber-text "></i>Campaign Management</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"> <i class="fa fa-caret-right md-amber-text"></i>Brand Management </p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"> <i class="fa fa-caret-right md-amber-text"></i>Business (Marketing) Strategy</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"> <i class="fa fa-caret-right md-amber-text"></i>Channel Management</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"><i class="fa fa-caret-right md-amber-text"></i>Budgeting and Planning</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"><i class="fa fa-caret-right md-amber-text"></i>Graphic Design</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"><i class="fa fa-caret-right md-amber-text"></i>Marketing Communications</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0"><i class="fa fa-caret-right md-amber-text"></i>Business Development</p>
                                </li>
                                <li>
                                    <p class="mdo-white-v7-text font-13 letter-space-xxs mb-0"><i class="fa fa-caret-right md-amber-text"></i>International Business</p>
                                </li>
                            </ul>
                        </div>

                        <!-- # REFERENCES -->
                        <div class="portlet portlet-body text-left mb-0">
                            <!-- Title -->
                            <h6 class="text-uppercase font-15 md-amber-text letter-space-xs title-resume">References</h6>
                            <hr class="border-dash border-mdo-white-v8 my-15">
                            <!-- 
                                CONTENT
                                Note : Attribute involve is Name of Referer , Relationship , Contact No , Email Address  
                                IF "Email Address " do not exist or null , hide it from resume
                            -->
                            <ul class="list-unstyled mt-ul-li-tb-4 px-5">
                                <li>
                                    <h6 class="md-amber-text font-13 my-5">Roy Goh</h6>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Former Peer </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> +6012 213 6043 </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> roy_goh@email.com </p>
                                </li>
                                <li>
                                    <h6 class="md-amber-text font-13 my-5">James Wu</h6>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Former Peer </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> +6011 3229 5016 </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> james.wu@email.com </p>
                                </li>
                                <li>
                                    <h6 class="md-amber-text font-13 my-5">Christine Lee </h6>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Former Manager </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> +6012 699 9768 </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> Christine.L@email.com </p>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="m-grid-col m-grid-col-xs-8 p-20">
                        <!-- # About Me @ Profile-->
                        <div class="row no-space mt-0 mb-15">
                            <!-- Title -->
                            <div class="m-grid title-resume mt-0">
                                <hr class="border-mdo-amber-v7 mb-10 mt-0">
                                <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">About Me</h6>
                                <hr class="border-mdo-amber-v7 mt-10 mb-0">
                            </div>
                            <!-- Description -->
                            <p class="font-12 text-justify line-height-sm md-grey-darken-4-text mt-10 px-5">Currently managing two brands under the same management. Experienced Marketing Manager with a demonstrated history of working in the telecommunications industry. Skilled in Strategic Brand Positioning, Creative Concept Design, Campaign Management, Brand Management, and Business (Marketing) Strategy. Strong marketing professional graduated from In-House Multimedia College and further my study at INTI International University.</p>
                        </div>

                        <!-- # Education -->
                        <!-- Note arrangement of each point is the latest one on top -->
                        <!-- Limit 4 [Select latest one on top] -->
                        <div class="row no-space mb-15">
                            <!-- Title -->
                            <div class="m-grid title-resume ">
                                <hr class="border-mdo-amber-v7 mb-10 mt-0">
                                <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">Education</h6>
                                <hr class="border-mdo-amber-v7 mt-10 mb-0">
                            </div>
                            <!-- Content -->
                            <ul class="list-unstyled mt-ul-li-tb-5 mt-10 px-5">
                                <li class="m-grid ">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text"> Present
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            June 2016
                                        </small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10">
                                        <h5 class="font-14 mb-5  md-darkblue-text">Diploma in Art / Design / Creative Multimedia</h5>
                                        <h6 class="mb-0 font-13 md-grey-darken-3-text font-weight-400">INTI International University</h6>
                                    </div>
                                </li>
                                <li class="m-grid ">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text"> Dec 2015
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Jan 2011
                                        </small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10">
                                        <h5 class="font-14 mb-5  md-darkblue-text">Diploma in Art / Design / Creative Multimedia</h5>
                                        <h6 class="mb-0 font-13 md-grey-darken-3-text font-weight-400">In-House Multimedia Training College</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- # Experience -->
                        <!-- Note arrangement of each point is the latest one on top -->
                        <div class="row no-space mb-15">
                            <!-- Title -->
                            <div class="m-grid  title-resume">
                                <hr class="border-mdo-amber-v7 mb-10 mt-0">
                                <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">Experience</h6>
                                <hr class="border-mdo-amber-v7 mt-10 mb-0">
                            </div>

                            <!-- Content -->
                            <ul class="list-unstyled mt-ul-li-tb-5  mt-10 px-5">
                                <li class="m-grid">
                                    <!-- END Date Joined - START Date Joined -->
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <!-- @ ATTR : Display Month and Year  -->
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">
                                            Present
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Jan 2015
                                        </small>
                                    </div>
                                    <!-- Content -->
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10 ">
                                        <!-- @ ATTR : Job Position Title -->
                                        <h5 class="font-14 mb-5 md-darkblue-text ">Marketing Manager</h5>
                                        <!-- @ ATTR : Company Name -->
                                        <h6 class="mb-5 font-13 font-weight-400 md-grey-darken-3-text">
                                            <i>Elabram Systems Sdn Bhd</i>
                                        </h6>
                                        <!-- @ ATTR : Description -->
                                        <p class="font-12 line-height-sm mb-0 text-justify">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>

                                    </div>
                                </li>
                                <li class="m-grid">
                                    <!-- Start Date Joined - End Date Joined -->
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <!-- @ ATTR : Display Month and Year  -->
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">Jan 2015
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Jan 2012
                                        </small>
                                    </div>
                                    <!-- Content -->
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10 ">
                                        <!-- @ ATTR : Job Position Title -->
                                        <h5 class="font-14 mb-5 md-darkblue-text">Marketing Management Consultant</h5>
                                        <!-- @ ATTR : Company Name -->
                                        <h6 class="mb-5 font-13 font-weight-400 md-grey-darken-3-text">
                                            <i>Business Owner</i>
                                        </h6>
                                        <!-- @ ATTR : Description -->
                                        <p class="font-12 line-height-sm mb-0 text-justify ">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>
                                </li>
                                <li class="m-grid">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text"> Dec 2011
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span> Aug 2008</small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10 ">
                                        <h5 class="font-14 mb-5 md-darkblue-text">Art Director + Asst Brand Manager</h5>
                                        <h6 class="mb-5 font-13 font-weight-400 md-grey-darken-3-text">
                                            <i>Bonia Bhd</i>
                                        </h6>
                                        <p class="font-12 line-height-sm mb-0 text-justify">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>

                                </li>
                                <li class="m-grid">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">
                                            Jun 2008
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            Dec 2005</small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10 ">
                                        <h5 class="font-14 mb-5 md-darkblue-text">Marketing and Communications</h5>
                                        <h6 class="mb-5 font-13 font-weight-400 md-grey-darken-3-text">
                                            <i>Sports Planet Sdn Bhd</i>
                                        </h6>
                                        <p class="font-12 line-height-sm mb-0 text-justify">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum mollitia sint nihil ratione asperiores, excepturi impedit expedita, commodi tempora cum, et neque esse eaque quas ab. Mollitia nisi recusandae a?
                                        </p>
                                    </div>
                                </li>
                                <li class="m-grid">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">Oct 2005
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span> May 2002</small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10 ">
                                        <h5 class="font-14 mb-5 md-darkblue-text">Visual Merchandise / Graphic Designer</h5>
                                        <h6 class="mb-5 font-13 font-weight-400 md-grey-darken-3-text">
                                            <i>OSIM (M) Sdn Bhd</i>
                                        </h6>
                                        <p class="font-12 line-height-sm mb-0 text-justify">
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
                            <div class="m-grid title-resume">
                                <hr class="border-mdo-amber-v7 mt-0 mb-10">
                                <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">Extracurricular Activity</h6>
                                <hr class="border-mdo-amber-v7 mt-10 mb-0">
                            </div>
                            <!-- Content -->
                            <ul class="list-unstyled mt-ul-li-tb-5  mt-10 px-5">
                                <li class="m-grid">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">Nov 2012</small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10">
                                        <h5 class="font-13 my-0">Title Event</h5>
                                    </div>
                                </li>
                                <li class="m-grid">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">Nov 2012</small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10">
                                        <h5 class="font-13 my-0">Title Event</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
        //var_dump($html);exit();

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