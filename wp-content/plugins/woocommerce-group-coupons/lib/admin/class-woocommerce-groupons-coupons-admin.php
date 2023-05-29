<?php
/**
 * class-woocommerce-groupons-coupons-admin.php
 *
 * Copyright (c) "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is provided subject to the license granted.
 * Unauthorized use and distribution is prohibited.
 * See COPYRIGHT.txt and LICENSE.txt
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This header and all notices must be kept intact.
 *
 * @author Karim Rahimpur
 * @package woocommerce-groupons
 * @since woocommerce-groupons 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds group info on the Coupons admin screen.
 */
class WooCommerce_Groupons_Coupons_Admin {

	/**
	 * Adds column hooks.
	 */
	public static function init() {
		if ( WOO_GROUPONS_GROUPS_IS_ACTIVE ) {
			add_filter( 'manage_edit-shop_coupon_columns', array( __CLASS__, 'shop_coupon_columns' ), 100 );
			add_action( 'manage_shop_coupon_posts_custom_column', array( __CLASS__, 'shop_coupon_posts_custom_column' ), 10, 2 );
		}
	}

	/**
	 * Adds our columns to the coupon list.
	 * @param array $posts_columns
	 * @return array
	 */
	public static function shop_coupon_columns( $posts_columns ) {
		$posts_columns['groups'] = sprintf(
			__( '<span title="%s">Groups</span>', 'woocommerce-group-coupons' ),
			__( 'Coupons are limited to members of the groups shown.', 'woocommerce-group-coupons' ) . ' ' .
			__( 'Coupons cannot be used by members of groups shown within parenthesis.', 'woocommerce-group-coupons' )
		);
		$posts_columns['auto_groups'] = sprintf( __( '<span title="%s">Auto</span>', 'woocommerce-group-coupons' ), __( 'Coupons are automatically applied to members of the groups shown.', 'woocommerce-group-coupons' ) );
		return $posts_columns;
	}

	/**
	 * Renders group and auto_group columns.
	 * @param string $column_name
	 * @param int $post_id
	 */
	public static function shop_coupon_posts_custom_column( $column_name, $post_id ) {
		switch( $column_name ) {
			case 'groups' :
				// required groups
				$group_ids = get_post_meta( $post_id, '_groupon_groups', false );
				if ( count( $group_ids ) > 0 ) {
					$groups = array();
					foreach( $group_ids as $group_id ) {
						if ( $group = Groups_Group::read( $group_id ) ) {
							$groups[] = $group;
						}
					}
					usort( $groups, array( __CLASS__, 'by_group_name' ) );
					echo '<ul>';
					foreach( $groups as $group ) {
						echo '<li>';
						echo wp_filter_nohtml_kses( $group->name );
						echo '</li>';
					}
					echo '</ul>';
				}
				// excluded groups
				$exclude_group_ids = get_post_meta( $post_id, '_groupon_exclude_groups', false );
				if ( count( $exclude_group_ids ) > 0 ) {
					$groups = array();
					foreach( $exclude_group_ids as $group_id ) {
						if ( $group = Groups_Group::read( $group_id ) ) {
							$groups[] = $group;
						}
					}
					usort( $groups, array( __CLASS__, 'by_group_name' ) );
					echo '<ul style="color:#900">';
					foreach( $groups as $group ) {
						echo '<li>';
						echo '(' . wp_filter_nohtml_kses( $group->name ) . ')';
						echo '</li>';
					}
					echo '</ul>';
				}
				// none
				if ( count( $group_ids ) == 0 && count( $exclude_group_ids ) == 0 ) {
					echo __( '-', 'woocommerce-group-coupons' );
				}
				break;
			case 'auto_groups' :
				$group_ids = get_post_meta( $post_id, '_groupon_auto_groups', false );
				if ( count( $group_ids ) > 0 ) {
					$groups = array();
					foreach( $group_ids as $group_id ) {
						if ( $group = Groups_Group::read( $group_id ) ) {
							$groups[] = $group;
						}
					}
					usort( $groups, array( __CLASS__, 'by_group_name' ) );
					echo '<ul>';
					foreach( $groups as $group ) {
						echo '<li>';
						echo wp_filter_nohtml_kses( $group->name );
						echo '</li>';
					}
					echo '</ul>';
				} else {
					echo __( '-', 'woocommerce-group-coupons' );
				}
				break;
		}
	}

	/**
	 * Group name comparison.
	 * @param Groups_Group $o1
	 * @param Groups_Group $o2
	 * @return int
	 */
	public static function by_group_name( $o1, $o2 ) {
		return strcmp( $o1->name, $o2->name );
	}

}
WooCommerce_Groupons_Coupons_Admin::init();
