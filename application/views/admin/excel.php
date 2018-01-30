<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$page_title.xls");	
?>
	<?php 
	if(isset($hasil)){?>
     	<h1><?=$page_title?></h1>
		<br />  
		<table border="1">	
			<tr>
				<th>No</th>
				<?php if($type == "Job Seeker"){?>
					<th>Name</th>
					<th>Email</th>
					<th>Video CV</th>
					<th>Resume</th>
				<?php }?>
				<?php if($type == "Employer"){?>
					<th>Company</th>
					<th>Company Email</th>
					<th>Contact Person</th>
					<th>Contact Person Email</th>
					<th>Phone</th>
					<th>Fax</th>
				<?php }?>
				<?php if($type == "pendampingan"){?>
					<th>Wilayah</th>
					<th>Provinsi</th>
					<th>PDAM</th>
					<th>Nama Kegiatan</th>
					<th>Tahun Pendampingan</th>
				<?php }?>
				<?php if($type == "sab"){?>
					<th>Wilayah</th>
					<th>Provinsi</th>
					<th>PDAM</th>
					<th>Nama Unit</th>
					<th>Sumber Air Baku</th>
					<th>Kapasitas L/S</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Created At</th>
				<?php }?>
				<?php if($type == "kinerja" || $type == "kinerja_info"){?>
					<th>Wilayah</th>
					<th>Provinsi</th>
					<th>PDAM</th>
					<th>Tahun</th>
					<th>Kategori</th>
					<th>Nilai</th>
					<th>Created At</th>
				<?php }?>
				<?php if($type == "plan" || $type == "jakstrada" || $type == "rispam"){?>
					<th>Wilayah</th>
					<th>Provinsi</th>
					<th>PDAM</th>
					<th>Tahun Pembuatan</th>
					<th>Nama Dokumen</th>
					<th>Telp</th>
					<th>Alamat</th>
					<th>Created At</th>
				<?php }?>
				<?php if($type == "kpbu"){?>
					<th>Wilayah</th>
					<th>Provinsi</th>
					<th>PDAM</th>
					<th>Status</th>
					<th>Kapasitas l/s</th>
					<th>SR</th>
					<th>Perkiraan jumlah penduduk (jiwa)</th>
					<th>Nilai investasi (dalam rp milyar)</th>
					<th>Created At</th>
				<?php }?>
				<?php if($type == "open_issue" || $type == "closed_issue" || $type == "assigned_issue"){?>
					<th>Issue By</th>
					<th>Type</th>
					<th>PDAM</th>
					<th>Submitted On</th>
				<?php }?>
				<?php if($type == "open_issue" || $type == "closed_issue" || $type == "my_issue" || $type == "assigned_issue"){?>
					<th>Title</th>
					<th>Status</th>
					<th>Tracking</th>
					<th>Submitted On</th>
				<?php }?>
				<?php if($type == "skm"){?>
					<th>Wilayah</th>
					<th>Provinsi</th>
					<th>PDAM</th>
					<th>Skematik</th>
					<th>Dokumen</th>
					<th>Created At</th>
				<?php }?>
				<?php if($type == "user_log"){?>
					<th>Role</th>
					<th>Nama</th>
					<th>Day</th>
					<th>Date</th>
					<th>Time</th>
				<?php }?>
				<?php if($type == "user_activities"){?>
					<th>Role</th>
					<th>Nama</th>
					<th>Day</th>
					<th>Date</th>
					<th>Time</th>
					<th>Activities</th>
					<th>DB</th>
					<th>Detail</th>
				<?php }?>
            </tr>
       		<?php 
			$no = 1;
			foreach ($hasil as $row)
            {  
			?>
				<tr>
					<td><?=$no++?></td>
					<?php if($type == "Job Seeker"){?>
						<td><?=$row->fullname?></td>
						<td><?=$row->email?></td>
						<td><?=$row->youtubelink?></td>
						<td><?php
							$id = $row->id;
							$id_encoded = rtrim(base64_encode($id), '=');
							echo base_url()?>profile/user/<?=$id_encoded; ?>
						</td>
					<?php }?>
					<?php if($type == "Employer"){?>
						<td> <?=$row->company_name; ?></td>
						<td> <?=$row->company_email; ?></td>
						<td> <?=$row->fullname; ?></td>
						<td> <?=$row->email; ?></td>
						<?php
							$building_phone = "";
							$building_fax = "";
							$company_address = json_decode($row->address);
							if (!empty($company_address)) {
								foreach ($company_address as $key => $value) {
									$building_phone = $value->building_phone;
									$building_fax = $value->building_fax;
									break;
								}
							}
						?>
						<td> <?=$building_phone; ?></td>
						<td> <?=$building_fax; ?></td>
					<?php }?>
					<?php if($type == "pendampingan"){?>
						<td><?=$row->prov_regional?></td>
						<td><?=$row->prov_name?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=$row->pd_name?></td>
						<td><?=$row->pd_tahun?></td>
						<td><?=date("j M Y H:i:s", strtotime($row->pd_create_at))?></td>
					<?php }?>
					<?php if($type == "sab"){?>
						<td><?=$row->prov_regional?></td>
						<td><?=$row->prov_name?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=$row->sab_unit?></td>
						<td><?=$row->sab_data?></td>
						<td><?=$row->sab_kapasitas?></td>
						<td><?=$row->sab_lat?></td>
						<td><?=$row->sab_long?></td>
						<td><?=date("j M Y H:i:s", strtotime($row->sab_create_at))?></td>
					<?php }?>
					<?php if($type == "kinerja" || $type == "kinerja_info"){?>
						<td><?=$row->prov_regional?></td>
						<td><?=$row->prov_name?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=$row->knj_tahun?></td>
						<td><?=$row->knj_nilai?></td>
						<td><?=$row->knj_nilai_angka?></td>
						<td><?=date("j M Y H:i:s", strtotime($row->knj_create_at))?></td>
					<?php }?>
					<?php if($type == "plan" || $type == "jakstrada" || $type == "rispam"){
						if($type == "plan"){
							$id 		= $row->bp_id;
							$pdam_id 	= $row->bp_pdam;
							$tahun 		= $row->bp_tahun;
							$dokumen 	= $row->bp_dokumen;
							$file 		= $row->bp_tahun;
							$create_at 	= $row->bp_create_at;
						}elseif($type == "jakstrada"){
							$id 		= $row->js_id;
							$pdam_id 	= $row->js_pdam;
							$tahun 		= $row->js_tahun;
							$dokumen 	= $row->js_dokumen;
							$file 		= $row->js_tahun;
							$create_at 	= $row->js_create_at;
						}else{
							$id 		= $row->rp_id;
							$pdam_id 	= $row->rp_pdam;
							$tahun 		= $row->rp_tahun;
							$dokumen 	= $row->rp_dokumen;
							$file 		= $row->rp_tahun;
							$create_at 	= $row->rp_create_at;
						}
					?>
						<td><?=$row->prov_regional?></td>
						<td><?=$row->prov_name?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=$tahun?></td>
						<td><?=$dokumen?></td>
						<td><?=$row->pdam_telp?></td>
						<td><?=$row->pdam_alamat?></td>
						<td><?=date("j M Y H:i:s", strtotime($create_at))?></td>
					<?php }?>
					<?php if($type == "kpbu"){?>
						<td><?=$row->prov_regional?></td>
						<td><?=$row->prov_name?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=$row->kpbu_status?></td>
						<td><?=$row->kpbu_kapasitas?></td>
						<td><?=$row->kpbu_sr?></td>
						<td><?=$row->kpbu_penduduk?></td>
						<td><?=$row->kpbu_nilai?></td>
						<td><?=date("j M Y H:i:s", strtotime($row->kpbu_create_at))?></td>
					<?php }?>
					<?php if($type == "open_issue" || $type == "closed_issue" || $type == "assigned_issue"){?>
						<td><?=$row->user_name?></td>
						<td><?=$row->is_type == "Publik"?'Publik':'Internal'?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=date("j M Y H:i:s", strtotime($row->is_create_at))?></td>
					<?php }?>
					<?php if($type == "open_issue" || $type == "closed_issue" || $type == "my_issue" || $type == "assigned_issue"){?>
						<td><?=$row->is_title?></td>
						<td><?=$row->is_status_user?></td>
						<td><?php if($row->is_status_user == "Open"){if($row->is_reply_by == 0){echo 'New';}elseif($row->is_reply_by == 1){echo 'Answered';}elseif($row->is_reply_by == 2){echo 'Issuer-Reply';}}?></td>
						<td><?=date('j M Y H:i', strtotime($row->is_create_at))?></td>
					<?php }?>
					<?php if($type == "skm"){?>
						<td><?=$row->prov_regional?></td>
						<td><?=$row->prov_name?></td>
						<td><?=$row->pdam_name?></td>
						<td><?=$row->skm_name?></td>
						<td><?=$row->skm_file?></td>
						<td><?=date("j M Y H:i:s", strtotime($row->skm_create_at))?></td>
					<?php }?>
					<?php if($type == "user_log"){?>
						<td><?php if($row->user_role == 1){ echo "Administrator";}elseif($row->user_role == 2){ echo "BPPSPAM";}elseif($row->user_role == 3){ echo "PDAM";}else{ echo "Publik";}?></td>
						<td><?=$row->user_name?></td>
						<td><?=date("l", strtotime($row->ul_last_login))?></td>
						<td><?=date("j M Y", strtotime($row->ul_last_login))?></td>
						<td><?=date("H:i:s", strtotime($row->ul_last_login))?></td>
					<?php }?>
					<?php if($type == "user_activities"){?>
						<td><?php if($row->user_role == 1){ echo "Administrator";}elseif($row->user_role == 2){ echo "BPPSPAM";}elseif($row->user_role == 3){ echo "PDAM";}else{ echo "Publik";}?></td>
						<td><?=$row->user_name?></td>
						<td><?=date("l", strtotime($row->ua_action_date))?></td>
						<td><?=date("j M Y", strtotime($row->ua_action_date))?></td>
						<td><?=date("H:i:s", strtotime($row->ua_action_date))?></td>
						<td><?=$row->ua_action_type?></td>
						<td><?=$row->ua_db?></td>
						<td><?=$row->ua_detail?></td>
					<?php }?>
				</tr>	
            <?php } ?> 
	</table>
    </div>
<?php 
} 
else
{
	echo "No data or You don't have privileges to access this data";
} ?>