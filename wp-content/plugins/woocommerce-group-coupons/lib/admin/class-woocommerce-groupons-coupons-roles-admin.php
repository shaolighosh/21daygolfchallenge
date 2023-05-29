<?php
/**
 * class-woocommerce-groupons-coupons-roles-admin.php
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
 * @since woocommerce-groupons 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds roles info on the Coupons admin screen.
 */
class WooCommerce_Groupons_Coupons_Roles_Admin {

	/**
	 * Adds column hooks.
	 */
	public static function init() {
		add_filter( 'manage_edit-shop_coupon_columns', array( __CLASS__, 'shop_coupon_columns' ), 100 );
		add_action( 'manage_shop_coupon_posts_custom_column', array( __CLASS__, 'shop_coupon_posts_custom_column' ), 10, 2 );
	}

	/**
	 * Adds our columns to the coupon list.
	 * @param array $posts_columns
	 * @return array
	 */
	public static function shop_coupon_columns( $posts_columns ) {
		$posts_columns['roles'] = sprintf(
			__( '<span title="%s">Roles</span>', 'woocommerce-group-coupons' ),
			__( 'Coupons are limited to the roles shown.', 'woocommerce-group-coupons' ) . ' ' .
			__( 'Coupons cannot be used by roles shown within parenthesis.', 'woocommerce-group-coupons' )
		);
		return $posts_columns;
	}

	/**
	 * Renders the roles column.
	 * @param string $column_name
	 * @param int $post_id
	 */
	public static function shop_coupon_posts_custom_column( $column_name, $post_id ) {
		switch( $column_name ) {
			case 'roles' :
				// required roles
				$coupon_roles = get_post_meta( $post_id, '_groupon_roles', false );
				if ( count( $coupon_roles ) > 0 ) {
					global $wp_roles;
					$role_names = $wp_roles->get_names();
					$roles = array();
					foreach( $coupon_roles as $role ) {
						if ( $wp_roles->is_role( $role ) ) {
							$roles[] = $role;
						}
					}
					usort( $roles, 'strcmp' );
					echo '<ul>';
					foreach( $roles as $role ) {
						echo '<li>';
						echo wp_filter_nohtml_kses( isset( $role_names[$role] ) ? $role_names[$role] : $role );
						echo '</li>';
					}
					echo '</ul>';
				}
				// excluded roles
				$exclude_coupon_roles = get_post_meta( $post_id, '_groupon_exclude_roles', false );
				if ( count( $exclude_coupon_roles ) > 0 ) {
					global $wp_roles;
					$role_names = $wp_roles->get_names();
					$roles = array();
					foreach( $exclude_coupon_roles as $role ) {
						if ( $wp_roles->is_role( $role ) ) {
							$roles[] = $role;
						}
					}
					usort( $roles, 'strcmp' );
					echo '<ul>';
					foreach( $roles as $role ) {
						echo '<li>';
						echo '(' . wp_filter_nohtml_kses( isset( $role_names[$role] ) ? $role_names[$role] : $role ) . ')';
						echo '</li>';
					}
					echo '</ul>';
				}
				if ( count( $coupon_roles ) === 0 && count( $exclude_coupon_roles ) === 0 ) {
					echo __( '-', 'woocommerce-group-coupons' );
				}
				break;
		}
	}
}
WooCommerce_Groupons_Coupons_Roles_Admin::init();
