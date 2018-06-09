<?php if(empty($roles) || $this->session->userdata('id') != $user_profile['overview']['id_users']){ ?>
    <div class="portlet p-50 bg-grey-cararra">
        <div class="portlet-body text-center">
            <i class="icon-puzzle font-grey-mint font-40 mb-40"></i>
            <h5 class="text-center font-weight-500 font-grey-mint">Found Nothing</h5>
            <h6 class="text-center font-16 font-grey-cascade mt-10 mt-30 font-weight-400 text-none mb-1">The person have not updated their info yet. </h6>
        </div>
    </div>
<?php }?>
<?php if(!empty($roles) && $this->session->userdata('id') == $user_profile['overview']['id_users']){ ?>
    <div class="portlet p-50 bg-grey-cararra">
        <div class="portlet-body text-center">
            <i class="icon-ghost font-grey-mint font-40 mb-40"></i>
            <h5 class="text-center font-weight-500 font-grey-mint">Something is missing...</h5>
            <h6 class="text-center  font-grey-cascade mt-10 mt-30 text-none">Add your info here to make your resume look great.</h6>
            <a href="<?=base_url()?>student/profile" class="btn btn-outline btn-md-indigo px-6">My Profile</a>
        </div>
    </div>
<?php }?>