<div class="social">
	<p style="color: #29292a">FOLLOW US</p>
	<?php
	if(is_page('header-2')) {
		$smof_data['header_right_content'] = 'Social Links';
		if($smof_data['scheme_type'] == 'Dark') {
			$smof_data['header_top_bg_color'] = '#29292a';
			$smof_data['snav_color'] = '#ffffff';
			$smof_data['header_top_first_border_color'] = '#3e3e3e';
		} else {
			$smof_data['header_top_bg_color'] = '#ffffff';
			$smof_data['snav_color'] = '#747474';
			$smof_data['header_top_first_border_color'] = '#efefef';
		}
	} elseif(is_page('header-3')) {
		$smof_data['header_right_content'] = 'Social Links';
		if($smof_data['scheme_type'] == 'Dark') {
			$smof_data['snav_color'] = '#747474';
			$smof_data['snav_color'] = '#bebdbd';
		} else {
			$smof_data['snav_color'] = '#ffffff';
			$smof_data['header_social_links_icon_color'] = '#ffffff';
		}
	} elseif(is_page('header-4')) {
		$smof_data['header_left_content'] = 'Social Links';
		if($smof_data['scheme_type'] == 'Dark') {
			$smof_data['snav_color'] = '#747474';
			$smof_data['snav_color'] = '#bebdbd';
		} else {
			$smof_data['snav_color'] = '#ffffff';
			$smof_data['header_social_links_icon_color'] = '#ffffff';
		}
		$smof_data['header_right_content'] = 'Navigation';
	} elseif(is_page('header-5')) {
		$smof_data['header_right_content'] = 'Social Links';
		if($smof_data['scheme_type'] == 'Dark') {
			$smof_data['snav_color'] = '#747474';
			$smof_data['snav_color'] = '#bebdbd';
		} else {
			$smof_data['snav_color'] = '#ffffff';
			$smof_data['header_social_links_icon_color'] = '#ffffff';
		}		
	}
	?>
<div class="fusion-social-networks"><a class="fusion-social-network-icon fusion-tooltip fusion-facebook fusionicon-facebook" target="_blank" href="https://www.facebook.com/FilmForward" style="color:#bebdbd;" data-placement="top" data-title="Facebook" data-toggle="tooltip" title="Facebook"></a><a class="fusion-social-network-icon fusion-tooltip fusion-twitter fusionicon-twitter" target="_blank" href="https://twitter.com/film4ward" style="color:#bebdbd;" data-placement="top" data-title="Twitter" data-toggle="tooltip" title="Twitter"></a></div>
</div>
