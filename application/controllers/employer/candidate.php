<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('global_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }

    public function index(){
        if($this->session->userdata('id') == FALSE) redirect(base_url().'login');

    	$profile['page_title'] = 'Candidate';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['profile_completion'] = $this->employer_model->get_profile_completion($profile);
        $segment = $this->uri->segment(URI_SEGMENT_DETAIL);
        $job_id = base64_decode($segment);
        $complement['job'] = $this->global_model->get_by_id('job_positions', array('id'=>$job_id));
        $complement['candidates'] = $this->employer_model->get_all_candidate($job_id);
        $complement['shortlisted'] = $this->get_shortlisted_candidate($job_id, $id);
        $complement['job_id'] = $segment;
        $complement['interview'] = $this->global_model->get_by_id('interview_schedule', array('job_id' => $job_id));
        $complement['invitation'] = $this->employer_model->get_interview_invitation($id);
        $complement['interview_session'] = $this->global_model->get_where('interview_schedule', array('job_id'=>$job_id));
        $calendar_footer['invitation'] = json_encode($this->employer_model->get_interview_invitation($id));
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/candidate',$complement);
        $this->load->view('employer/main/footer',$calendar_footer);
    }

    function get_shortlisted_candidate($job_id){
        $id = $this->session->userdata('id');
        $candidates = $this->employer_model->get_shortlisted_candidate($job_id, $id);
        return $candidates;
    }

    function add_session(){
        $job_id = base64_decode($this->input->post('job_id'));

        $start = explode(' - ', $this->input->post('start_date'));
        $start_date = date('Y-m-d',strtotime(current($start)));
        $start_hour = date('H:i:s', strtotime(end($start)));
        $start_date_hour = implode(' ', array($start_date, $start_hour));

        $end = explode(' - ', $this->input->post('end_date'));
        $end_date = date('Y-m-d',strtotime(current($end)));
        $end_hour = date('H:i:s', strtotime(end($end)));
        $end_date_hour = implode(' ', array($end_date, $end_hour));

        $session = array('job_id'=>$job_id,
                        'title' => $this->input->post('title'), 
                        'start_date'=> date('Y-m-d H:i:s', strtotime($start_date_hour)),
                        'end_date'=> date('Y-m-d H:i:s', strtotime($end_date_hour)),
                        'description'=> $this->input->post('description'));
        $this->global_model->create('interview_schedule', $session);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Create Interview Schedule Session",
					'icon' 			=> "fa-calendar",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'job/candidate/'.rtrim(base64_encode($job_id),'='));
    }

    function edit_session(){
        $job_id = base64_decode($this->input->post('job_id'));

        $page = $this->input->post('page');

        $start = explode(' - ', $this->input->post('start_date'));
        $start_date = date('Y-m-d',strtotime(current($start)));
        $start_hour = date('H:i:s', strtotime(end($start)));
        $start_date_hour = implode(' ', array($start_date, $start_hour));

        $end = explode(' - ', $this->input->post('end_date'));
        $end_date = date('Y-m-d',strtotime(current($end)));
        $end_hour = date('H:i:s', strtotime(end($end)));
        $end_date_hour = implode(' ', array($end_date, $end_hour));
        $id = $this->input->post('id');
        $session = array('job_id'=>$job_id,
                        'title' => $this->input->post('title'), 
                        'start_date'=> date('Y-m-d H:i:s', strtotime($start_date_hour)),
                        'end_date'=> date('Y-m-d H:i:s', strtotime($end_date_hour)),
                        'description'=> $this->input->post('description'));
        $this->global_model->update('interview_schedule', array('id' => $id ) ,$session);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Edit Interview Schedule Session",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        if ($page != 'calendar') {
            redirect(base_url().'job/candidate/'.rtrim(base64_encode($job_id),'='));
        }else{
            redirect(base_url().'employer/calendar/');
        }
    }

    function remove_interview_session(){
        $session_id = base64_decode($this->input->post('session_id'));
        $page_id = $this->uri->segment(URI_SEGMENT_DETAIL);
        $this->global_model->remove('interview_schedule', array('id' => $session_id));
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Delete Interview Schedule Session",
					'icon' 			=> "fa-trash",
					'label' 		=> "danger",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'job/candidate/'.rtrim(base64_encode($page_id),'='));   
    }

    public function reschedule_interview_session(){
        if($this->session->userdata('id') == FALSE) redirect(base_url().'login');
        
        $interview_schedule_id      = base64_decode($this->input->post('interview_schedule_id'));
        $interview_schedule_user_id = base64_decode($this->input->post('candidate_id'));
        $page_id                    = $this->input->post('job_position_id');
        $start                      = explode(' - ', $this->input->post('start_date'));
        $start_date                 = date('Y-m-d',strtotime(current($start)));
        $start_hour                 = date('H:i:s', strtotime(end($start)));
        $start_date_hour            = implode(' ', array($start_date, $start_hour));

        $end            = explode(' - ', $this->input->post('end_date'));
        $end_date       = date('Y-m-d',strtotime(current($end)));
        $end_hour       = date('H:i:s', strtotime(end($end)));
        $end_date_hour  = implode(' ', array($end_date, $end_hour));

        $title          = 'Reschedule Session on'. $this->input->post('start_date');
        $description    = $this->input->post('reschedule_detail');

        $reschedule_data = array(   'start_date' => $start_date_hour,
                                    'end_date' => $end_date_hour,
                                    'title' => $title,
                                    'description' => $description,
                                    'job_id' => base64_decode($page_id));
        $reschedule = $this->employer_model->interview_reschedule($reschedule_data, $interview_schedule_id);

        //BEGIN : set recent activities
        $data = array(
                    'user_id'       => $this->session->userdata('id'),
                    'ip_address'    => $this->input->ip_address(),
                    'activity'      => "Edit Interview Schedule Session",
                    'icon'          => "fa-edit",
                    'label'         => "success",
                    'created_at'    => date('Y-m-d H:i:s'),
                );
        setRecentActivities($data);
        //END : set recent activities

        if($this->input->post('confirmation') == 'Yes')
        {
            //BEGIN : set create notification
            $getUserCompany = $this->job_model->getJobById(base64_decode($page_id));

            $userMail = $this->user_model->getUserMail(
                                                        array(
                                                                'sender_id'     =>  $data["user_id"],
                                                                'receiver_id'   =>  $interview_schedule_user_id
                                                        )
                                            );

            $MailContent = array(   
                            "sender_name"       => $userMail["sender_name"],
                            "receiver_name"     => $userMail["receiver_name"],
                            "job_name"          => $getUserCompany['name'],
                            'url'               => "student/calendar"
                        );

            $messageHtml    = $this->load->view("mail/reschedule_interview_accept",$MailContent,true);
            $subject        = "[RESCHEDULE INTERVIEW] ".$userMail["sender_name"]." accept to reschedule the interview";

            $MailData = array(  
                            "sender_email"      => "support@xremo.com",
                            "receiver_email"    => $userMail["receiver_email"],
                            'subject'           => $subject,
                            'message_html'      => $messageHtml
                        );

            $NotifData = array(
                        'from_id'       => $data["user_id"],
                        'user_id'       => $interview_schedule_user_id,
                        'subject'       => $subject,
                        'message_html'  => $messageHtml,
                        'url'           => $MailContent["url"],
                        'type'          => "reschedule_interview_by_employer",
                        'viewed'        => 0,
                        'created_at'    => date('Y-m-d H:i:s'),
                    );
            CreateNotif($NotifData,$MailData);
            //END : set create notification
        }
        else
        {
            //BEGIN : set create notification
            $getUserCompany = $this->job_model->getJobById(base64_decode($page_id));

            $userMail = $this->user_model->getUserMail(
                                                        array(
                                                                'sender_id'     =>  $data["user_id"],
                                                                'receiver_id'   =>  $interview_schedule_user_id
                                                        )
                                            );

            $MailContent = array(   
                            "sender_name"       => $userMail["sender_name"],
                            "receiver_name"     => $userMail["receiver_name"],
                            "job_name"          => $getUserCompany['name'],
                            'url'               => "student/calendar"
                        );

            $messageHtml    = $this->load->view("mail/reschedule_interview_reject",$MailContent,true);
            $subject        = "[RESCHEDULE INTERVIEW] ".$userMail["sender_name"]." rejected to reschedule the interview";

            $MailData = array(  
                            "sender_email"      => "support@xremo.com",
                            "receiver_email"    => $userMail["receiver_email"],
                            'subject'           => $subject,
                            'message_html'      => $messageHtml
                        );

            $NotifData = array(
                        'from_id'       => $data["user_id"],
                        'user_id'       => $interview_schedule_user_id,
                        'subject'       => $subject,
                        'message_html'  => $messageHtml,
                        'url'           => $MailContent["url"],
                        'type'          => "reschedule_interview_by_employer",
                        'viewed'        => 0,
                        'created_at'    => date('Y-m-d H:i:s'),
                    );
            CreateNotif($NotifData,$MailData);
            //END : set create notification
        }

        redirect(base_url().'job/candidate/'.$page_id);   
    }

}

?>