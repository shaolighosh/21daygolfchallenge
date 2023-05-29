<?php
	//vars
	global $wpdb, $pmpro_currency_symbol;

	if(isset($_REQUEST['edit']))
		$edit = $_REQUEST['edit'];
	else
		$edit = false;

	if(isset($_REQUEST['report']))
		$report = $_REQUEST['report'];
	else
		$report = false;

	if(isset($_REQUEST['settings']))
		$settings = $_REQUEST['settings'];
	else
		$settings = false;

	if(isset($_REQUEST['s']))
		$s = $_REQUEST['s'];
	else
		$s = false;

	if(isset($_REQUEST['copy']))
		$copy = $_REQUEST['copy'];
	else
		$copy = false;

	if(isset($_REQUEST['delete']))
		$delete = $_REQUEST['delete'];
	else
		$delete = false;

	if(!empty($_REQUEST['save']))
		$save = true;
	else
		$save = false;

	//get form values
	if(!empty($save))
	{
		if(isset($_REQUEST['code']))
			$code = preg_replace("[^a-zA-Z0-9]", "", $_REQUEST['code']);
		if(isset($_REQUEST['name']))
			$name = $_REQUEST['name'];
		if(isset($_REQUEST['affiliateuser']))
			$affiliateuser = $_REQUEST['affiliateuser'];
		if(isset($_REQUEST['trackingcode']))
			$trackingcode = $_REQUEST['trackingcode'];
		if(isset($_REQUEST['cookiedays']))
			$cookiedays = preg_replace("[^0-9]", "", $_REQUEST['cookiedays']);
		if(isset($_REQUEST['enabled']))
			$enabled = $_REQUEST['enabled'];
	}
	elseif($edit > 0 || ($report && $report != "all") || $copy)
	{
		//get values from DB
		if($edit > 0)
			$affiliate_id = $edit;
		elseif($report)
			$affiliate_id = $report;
		elseif($copy)
			$affiliate_id = $copy;
		$affiliate = $wpdb->get_row("SELECT * FROM $wpdb->pmpro_affiliates WHERE id = '" . intval($affiliate_id) . "' LIMIT 1");
		if(!empty($affiliate->id))
		{
			$code = $affiliate->code;
			$name = $affiliate->name;
			$affiliateuser = $affiliate->affiliateuser;
			$trackingcode = $affiliate->trackingcode;
			$cookiedays = $affiliate->cookiedays;
			$enabled = $affiliate->enabled;
		}
	}
	else
	{
		//defaults
		$code = pmpro_affiliates_getNewCode();
		$name = "";
		$affiliateuser = "";
		$trackingcode = "";
		$cookiedays = "30";
		$enabled = true;
	}

	if($edit && $save)
	{
		//updating or new?
		if($edit > 0)
		{
			$sqlQuery = "UPDATE $wpdb->pmpro_affiliates SET code = '" . esc_sql($code) . "', name = '" . esc_sql($name) . "', affiliateuser = '" . esc_sql($affiliateuser) . "', trackingcode = '" . esc_sql($trackingcode) . "', cookiedays = '" . esc_sql($cookiedays) . "', enabled = '" . esc_sql($enabled) . "' WHERE id = '" . $edit . "' LIMIT 1";
			if($wpdb->query($sqlQuery) !== false)
			{
				//all good
				$edit = false;
				$pmpro_msg = __("Affiliate saved successfully.", "pmpro_affiliates");
				$pmpro_msgt = "success";
			}
			else
			{
				//error
				$pmpro_msg = __("There was an error saving the affiliate.", "pmpro_affiliates");
				$pmpro_msgt = "error";
			}
		}
		else
		{
			$sqlQuery = "INSERT INTO $wpdb->pmpro_affiliates (code, name, affiliateuser, trackingcode, cookiedays, enabled) VALUES('" . esc_sql($code) . "', '" . esc_sql($name) . "', '" . esc_sql($affiliateuser) . "', '" . esc_sql($trackingcode) . "', '" . intval($cookiedays) . "', '" . esc_sql($enabled) . "')";
			if($wpdb->query($sqlQuery) !== false)
			{
				//all good
				$edit = false;
				$pmpro_msg = __("Affiliate added successfully.", "pmpro_affiliates");
				$pmpro_msgt = "success";
			}
			else
			{
				//error
				$pmpro_msg = __("There was an error adding the affiliate.", "pmpro_affiliates");
				$pmpro_msgt = "error";
			}
		}

	}

	//are we deleting?
	if(!empty($delete))
	{
		$sqlQuery = "DELETE FROM $wpdb->pmpro_affiliates WHERE id=" . esc_sql($delete) . " LIMIT 1";
		if($wpdb->query($sqlQuery) !== false)
		{
			//all good
			$delete = false;
			$pmpro_msg = __("Affiliate deleted successfully.", "pmpro_affiliates" );
			$pmpro_msgt = "success";
		}
		else
		{
			//error
			$pmpro_msg = __("There was an error deleting the affiliate.", "pmpro_affiliates" );
			$pmpro_msgt = "error";
		}
	}

	//get settings for default term names
	$pmpro_affiliates_settings = pmpro_affiliates_get_settings();
	$pmpro_affiliates_singular_name = $pmpro_affiliates_settings['pmpro_affiliates_singular_name'];
	$pmpro_affiliates_plural_name = $pmpro_affiliates_settings['pmpro_affiliates_plural_name'];
?>
<?php
	require_once( PMPRO_DIR . "/adminpages/admin_header.php" );
	?>
	<h2>
		<?php echo sprintf( __('%s Add On: Lightweight %s Tracking', 'pmpro_affiliates' ), ucwords($pmpro_affiliates_plural_name), ucwords($pmpro_affiliates_plural_name) ); ?>
	</h2>

	<h2 class="nav-tab-wrapper">
		<a href="admin.php?page=pmpro-affiliates" class="nav-tab<?php if(empty($report) && empty($settings)) { ?> nav-tab-active<?php } ?>"><?php _e('Manage', 'pmpro_affiliates' ); ?> <?php echo ucwords($pmpro_affiliates_plural_name); ?></a>
		<a href="admin.php?page=pmpro-affiliates&report=all" class="nav-tab<?php if(!empty($report)) { ?> nav-tab-active<?php } ?>"><?php _e('Reports', 'pmpro_affiliates' ); ?></a>
		<a href="admin.php?page=pmpro-affiliates&settings=1" class="nav-tab<?php if(!empty($settings)) { ?> nav-tab-active<?php } ?>"><?php _e('Settings', 'pmpro_affiliates' ); ?></a>
	</h2>
	<br class="clear" />
	<?php

	if($edit)
	{
		?>
		<h2>
			<?php
				if($edit > 0)
					echo __("Edit", "pmpro_affiliates")." " . ucwords($pmpro_affiliates_singular_name);
				else
					echo __("Add New", "pmpro_affiliates")." " . ucwords($pmpro_affiliates_singular_name);
			?>
		</h2>

		<?php if(!empty($pmpro_msg)) { ?>
			<div id="message" class="<?php if($pmpro_msgt == "success") echo "updated fade"; else echo "error"; ?>"><p><?php echo $pmpro_msg?></p></div>
		<?php } ?>

		<div>

			<form action="" method="post">
				<input name="saveid" type="hidden" value="<?php echo $edit?>" />
				<table class="form-table">
				<tbody>
					<tr>
						<th scope="row" valign="top"><label><?php _e('ID:', 'pmpro_affiliates'); ?></label></th>
						<td class="pmpro_lite"><?php if(!empty($affiliate->id)) echo $affiliate->id; else _e("This will be generated when you save.", "pmpro_affiliates"); ?></td>
					</tr>

					<tr>
						<th scope="row" valign="top"><label for="code"><?php _e('Code:', 'pmpro_affiliates'); ?></label></th>
						<td>
							<input id="code" name="code" type="text" size="20" value="<?php if(!empty($code)) echo esc_attr($code);?>" />
							<small><?php echo sprintf( __('Value added to the site URL to designate the %s link. (e.g. "&pa=CODE" or "?pa=CODE")', 'pmpro_affiliates' ), $pmpro_affiliates_singular_name ); ?></small>
						</td>
					</tr>

					<tr>
						<th scope="row" valign="top"><label for="name"><?php _e('Business/Contact Name:', 'pmpro_affiliates'); ?></label></th>
						<td>
							<input id="name" name="name" type="text" size="40" value="<?php if(!empty($name)) echo esc_attr(stripslashes($name));?>" />
						</td>
					</tr>

					<tr>
						<th scope="row" valign="top"><label for="affiliateuser"><?php echo sprintf('%s User:', ucwords($pmpro_affiliates_singular_name), 'pmpro_affiliates'); ?></label></th>
						<td>
							<input id="affiliateuser" name="affiliateuser" type="text" size="20" value="<?php if(!empty($affiliateuser)) echo esc_attr($affiliateuser);?>" />
							<small><?php echo sprintf( __('The username of a WordPress user in your site who should have access to %s reports.', 'pmpro_affiliates'), $pmpro_affiliates_singular_name ); ?></small>
						</td>
					</tr>

					<tr>
						<th scope="row" valign="top"><label for="trackingcode"><?php _e('Tracking Code:', 'pmpro_affiliates'); ?></label></th>
						<td>
							<textarea id="trackingcode" name="trackingcode" rows="6" cols="60"><?php if(!empty($trackingcode)) echo esc_textarea(stripslashes($trackingcode));?></textarea>
							<br /><small><?php echo sprintf( __("(Optional) If you are tracking this %s through another system, you can add HTML/JS code here to run on the confirmation page after checkout. Variables:", "pmpro_affiliates" ), $pmpro_affiliates_singular_name ); ?> !!ORDER_ID!!, !!ORDER_AMOUNT!!, !!LEVEL_NAME!!</small>
						</td>
					</tr>

					<tr>
						<th scope="row" valign="top"><label for="cookiedays"><?php _e('Cookie Length:', 'pmpro_affiliates'); ?></label></th>
						<td>
							<input name="cookiedays" type="text" size="5" value="<?php if(!empty($cookiedays)) echo esc_attr($cookiedays);?>" />
							<small><?php _e( 'In days.', 'pmpro_affiliates' ); ?></small>
						</td>
					</tr>

					<tr>
						<th scope="row" valign="top"><label for="enabled"><?php _e('Enabled:', 'pmpro_affiliates'); ?></label></th>
						<td id="enabled">
							<input type="radio" name="enabled" value="1" <?php if(!empty($enabled)) { ?>checked="checked"<?php } ?>><?php _e( 'Yes', 'pmpro_affiliates'); ?>
							&nbsp;
							<input type="radio" name="enabled" value="0" <?php if(empty($enabled)) { ?>checked="checked"<?php } ?>><?php _e( 'No', 'pmpro_affiliates'); ?>
						</td>
					</tr>

				</tbody>
			</table>

			<?php do_action("pmpro_affiliate_after_settings"); ?>

			<p class="submit topborder">
				<input name="edit" type="hidden" value="<?php if(!empty($edit)) echo $edit?>" />
				<input name="save" type="hidden" value="1" />
				<input type="submit" class="button-primary" value="<?php echo sprintf(__('Save %s','pmpro_affiliates'), ucwords($pmpro_affiliates_singular_name) ); ?>" />
				<input name="cancel" class="button" type="button" value="Cancel" onclick="location.href='<?php echo get_admin_url(NULL, '/admin.php?page=pmpro-affiliates'); ?>';" />
			</p>
			</form>
		</div>

		<?php
	}
	elseif($settings)
	{
		//show the settings for affiliate add ons
		require_once("settings.php");
	}
	elseif($report)
	{
		//show the report for affiliate activity
		require_once("report.php");
	}
	else
	{
		?>
		<h1>
			<?php echo ucwords($pmpro_affiliates_plural_name); ?>
			<a href="admin.php?page=pmpro-affiliates&edit=-1" class="add-new-h2"><?php _e('Add New', 'pmpro_affiliates'); ?> <?php echo ucwords($pmpro_affiliates_singular_name); ?></a>
			<a href="admin.php?page=pmpro-affiliates&report=all" class="add-new-h2"><?php _e('View', 'pmpro_affiliates'); ?> <?php echo ucwords($pmpro_affiliates_plural_name); ?> <?php _e('Report', 'pmpro_affiliates'); ?></a>
		</h1>

		<?php if(!empty($pmpro_msg)) { ?>
			<div id="message" class="<?php if($pmpro_msgt == "success") echo "updated fade"; else echo "error"; ?>"><p><?php echo $pmpro_msg?></p></div>
		<?php } ?>

		<form id="posts-filter" method="get" action="">
			<p class="search-box">
				<label class="screen-reader-text" for="post-search-input"><?php echo sprintf('Search %s:', ucwords($pmpro_affiliates_plural_name), 'pmpro_affiliates'); ?></label>
				<input type="hidden" name="page" value="pmpro-affiliates" />
				<input id="post-search-input" type="text" value="<?php if(!empty($s)) echo $s;?>" name="s" size="30" />
				<input class="button" type="submit" value="Search" id="search-submit "/>
			</p>
		</form>

		<br class="clear" />

		<table class="widefat">
		<thead>
			<tr>
				<th><?php _e('ID', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Code', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Name', 'pmpro_affiliates'); ?></th>
				<th><?php _e('User', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Cookie', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Enabled', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Visits', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Conversion %', 'pmpro_affiliates'); ?></th>
				<th><?php _e('Earnings', 'pmpro_affiliates'); ?></th>
				<th><?php _e('', 'pmpro_affiliates'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = 0;
				$affiliates = $wpdb->get_results("SELECT * FROM $wpdb->pmpro_affiliates");
				if(empty($affiliates))
				{
				?>
					<tr><td colspan="6" class="pmpro_pad20">
						<p><?php echo sprintf( __('Use %s to track orders coming in from different sales campaigns and partners.', 'pmpro_affiliates'), $pmpro_affiliates_plural_name ); ?> <a href="admin.php?page=pmpro-affiliates&edit=-1"><?php echo sprintf( __( 'Create your first %s now', 'pmpro_affiliates' ), $pmpro_affiliates_singular_name ); ?></a>.</p>
					</td></tr>
				<?php
				}
				else
				{
					foreach($affiliates as $affiliate)
					{
					?>
					<tr<?php if($count++ % 2 == 1) { ?> class="alternate"<?php } ?>>
						<td><?php echo $affiliate->id?></td>
						<td class="affiliate_code column-affiliate_code has-row-actions">
							<a href="?page=pmpro-affiliates&report=<?php echo $affiliate->id?>"><?php echo $affiliate->code?></a>
							<br />
							<div class="row-actions">
								<span class="report">
									<a href="?page=pmpro-affiliates&report=<?php echo $affiliate->id?>"><?php _e('Report', 'pmpro_affiliates'); ?></a>
								</span> |
								<span class="edit">
									<a href="?page=pmpro-affiliates&edit=<?php echo $affiliate->id?>"><?php _e('Edit', 'pmpro_affiliates'); ?></a>
								</span> |
								<span class="copy">
									<a href="?page=pmpro-affiliates&edit=-1&copy=<?php echo $affiliate->id?>"><?php _e('Copy', 'pmpro_affiliates'); ?></a>
								</span> |
								<span class="link">
									<a target="_blank" href="<?php echo pmpro_url("levels", "?pa=" . $affiliate->code);?>"><?php _e('Link', 'pmpro_affiliates'); ?></a>
								</span> |
								<span class="delete">
									<a href="javascript:askfirst('<?php echo str_replace("'", "\'", sprintf(__("Deleting affiliates is permanent and can affect active users. Are you sure you want to delete affiliate %s?", "pmpro_affiliates"), str_replace("'", "", $affiliate->id)));?>', 'admin.php?page=pmpro-affiliates&delete=<?php echo $affiliate->id;?>'); void(0);"><?php _e('Delete', 'pmpro_affiliates'); ?></a>
								</span>
							</div>
						</td>
						</td>
						<td><?php echo stripslashes($affiliate->name); ?></td>
						<td><?php echo stripslashes($affiliate->affiliateuser); ?></td>
						<td><?php echo $affiliate->cookiedays . " days"; ?></td>
						<td><?php echo pmpro_affiliates_yesorno($affiliate->enabled); ?></td>
						<td><?php echo intval($affiliate->visits);?></td>
						<td>
							<?php
								$norders = $wpdb->get_var("SELECT COUNT(total) FROM $wpdb->pmpro_membership_orders WHERE affiliate_id = '" . esc_sql($affiliate->id) . "' AND status NOT IN('pending', 'error', 'refunded', 'refund', 'token', 'review')");
								if(empty($affiliate->visits))
									echo "0%";
								else
									echo round($norders / $affiliate->visits * 100, 2) . "%";
							?>
						</td>
						<td>
							<?php
								$earnings = $wpdb->get_var("SELECT SUM(total) FROM $wpdb->pmpro_membership_orders WHERE affiliate_id = '" . esc_sql($affiliate->id) . "' AND status NOT IN('pending', 'error', 'refunded', 'refund', 'token', 'review')");
								echo pmpro_formatPrice($earnings);
							?>
						</td>
					</tr>
					<?php
					}
				}
				?>
		</tbody>
		</table>
	<?php
	}
	?>
	<hr />
	<p><a href="https://www.paidmembershipspro.com/add-ons/pmpro-lightweight-affiliate-tracking/?utm_source=plugin&utm_medium=pmpro-affiliates-admin&utm_campaign=add-ons" target="_blank"><?php _e('Documentation', 'pmpro_affiliates'); ?></a> | <a href="https://www.paidmembershipspro.com/support/?utm_source=plugin&utm_medium=pmpro-affiliates-admin&utm_campaign=support" target="_blank"><?php _e('Support', 'pmpro_affiliates'); ?></a></p>
	<?php
	require_once( PMPRO_DIR . "/adminpages/admin_footer.php" );
?>
