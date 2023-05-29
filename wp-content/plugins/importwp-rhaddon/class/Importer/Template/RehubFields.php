<?php

namespace ImportWPAddon\RehubFields\Importer\Template;

use ImportWP\Common\Importer\ParsedData;
use ImportWP\Common\Importer\Template\PostTemplate;
use ImportWP\Common\Importer\Template\Template;
use ImportWP\Common\Model\ImporterModel;
use ImportWP\EventHandler;
use ImportWP\Container;

class RehubFields
{

    public function __construct(EventHandler $event_handler)
    {
        $event_handler;

        // display
        $event_handler->listen('template.data_groups', [$this, 'data_groups']);
        $event_handler->listen('template.fields', [$this, 'fields']);

        // save
        $event_handler->listen('template.pre_process', [$this, 'pre_process']);
        $event_handler->listen('template.process', [$this, 'process']);


    }

    public function data_groups($groups)
    {
        return array_merge((array) $groups, [
            'offer_fields', 'ce_fields', 'review_fields', 'criterias_fields'
        ]);
    }

    public function fields($fields, Template $template)
    {
        $mapper = $template->get_mapper();
        
        $offer_fields = $ce_fields = $review_fields = $criterias_fields = [];
        
        if (in_array($mapper, ['post'], true)) {
            $offer_fields = array_merge($offer_fields, [
                $template->register_field('Offer URL (required)', 'rehub_offer_product_url', [
                    'tooltip' => 'Required if you want to have Post offer'
                ]),
                //$template->register_field('Title of offer', 'offer_name', []),
                $template->register_field('Description', 'rehub_offer_product_desc', [
                    'tooltip' => 'A custom short description for the Post Offer',
                ]), 
                $template->register_field('Regular price', 'rehub_offer_product_price', [
                    'tooltip' => 'Insert sale price of the Offer (example, $55). Please, choose your price pattern in Theme options - Localizations',
                ]),         
                $template->register_field('Old price', 'rehub_offer_product_price_old', []), 
                $template->register_field('Button text', 'rehub_offer_btn_text', [
                    'tooltip' => 'Insert text on button or leave blank to use default text. Use short names (not more than 14 symbols)"',
                ]),
                $template->register_field('Coupon code', 'rehub_offer_product_coupon', []),
                $template->register_field('Coupon end date', 'rehub_offer_coupon_date', [
                    'tooltip' => 'Choose expiration date of coupon or leave blank',
                ]),
                $template->register_field('Convert date format', 'rehub_offer_coupon_date_format', [
                    'options' => [
                        ['value' => '-', 'label' => 'No conversion'],
                        ['value' => '1', 'label'  => 'd/m/Y'],
                        ['value' => '2', 'label'  => 'd/m/y'],
                        ['value' => '3', 'label'  => 'Y-m-d H:i:s'],
                        ['value' => '4', 'label'  => 'd/m/Y H:i:s'],
                    ],
                    'default' => '-'
                ]),
                $template->register_field('Mask coupon code', 'rehub_offer_coupon_mask', [
                    'options' => [
                        ['value' => 0, 'label' => 'No'],
                        ['value' => 1, 'label' => 'Yes'],
                    ],
                    'default' => 0
                ]),
                $template->register_field('Disclaimer', 'rehub_offer_disclaimer', [
                    'tooltip' => 'Optional. It works in [quick_offer] and [wpsm_top] shortcodes',
                ]),         
                $template->register_field('Discount Tag', 'rehub_offer_discount', [
                    'tooltip' => 'Optional. Will be visible in deal, coupon list instead featured image. It shows maximum 5 symbols. Example: $20',
                ]),
                $template->register_field('Cashback notice', 'rehub_notice_custom', [
                    'tooltip' => 'Optional. It shows on deal grid and deal list',
                ]), 
                $template->register_field('Thumbnail URL', 'rehub_offer_product_thumb', [
                    'tooltip' => 'Use if you want to have external Thumbnail instead your Featured image. This will save space on site but reduce speed of image loading.',
                ]),
                $template->register_field('Merchant/Store Logo URL', 'rehub_offer_logo_url', [
                    'tooltip' => 'Use if you want to have external image for store logo. This will save space on site but reduce speed of image loading. You can also set Store logos globally for each store in Posts - Affiliate Store',
                ]),
                $template->register_field('Post Layout', 'rehub_post_layout', [
                    'options' => rehub_get_post_layout_array(),
                ]),
            ]);
        }

        if (in_array($mapper, ['woocommerce-product'], true)) {
            $offer_fields = array_merge($offer_fields, [
                $template->register_field('Coupon code', 'rehub_woo_coupon_code', []),
                $template->register_field('External image URL', 'rehub_woo_coupon_logo_url', []),
                $template->register_field('Coupon end date', 'rehub_woo_coupon_date', [
                    'tooltip' => 'Choose expiration date of coupon or leave blank',
                ]),
                $template->register_field('Convert date format', 'rehub_woo_coupon_date_format', [
                    'options' => [
                        ['value' => '-', 'label' => 'No conversion'],
                        ['value' => '1', 'label'  => 'd/m/Y'],
                        ['value' => '2', 'label'  => 'd/m/y'],
                        ['value' => '3', 'label'  => 'Y-m-d H:i:s'],
                        ['value' => '4', 'label'  => 'd/m/Y H:i:s'],
                    ],
                    'default' => '-'
                ]),
                $template->register_field('Mask coupon code', 'rehub_woo_coupon_mask', [
                    'options' => [
                        ['value' => 0, 'label' => 'No'],
                        ['value' => 1, 'label' => 'Yes'],
                    ],
                    'default' => 0
                ]), 
                $template->register_field('Additional coupon image url', 'rehub_woo_coupon_coupon_img_url', [
                    'tooltip' => 'Used for printable coupon function',
                ]),
                $template->register_field('Custom area near Button', 'rh_code_incart', []),
                $template->register_field('Custom area near Content', 'rehub_woodeals_short', []),
                $template->register_field('Product Layout', 'rehub_product_layout', [
                    'options' => rehub_get_product_layout_array(''),
                ]),
            ]);
        }

        if (in_array($mapper, ['woocommerce-product', 'post'], true)) {
            $review_fields = array_merge($review_fields, [ 
                $template->register_field('Review Heading', 'review_heading', []),
                $template->register_field('Summary Text', 'review_summary', []),
                $template->register_field('PROS', 'review_post_pros', ['tooltip'=>'Place each from separate line (optional)']),
                $template->register_field('CONS', 'review_post_cons', ['tooltip'=>'Place each from separate line (optional)']),
                $template->register_field('Disable auto review box?', 'review_shortcode', [
                    'default' => 0,
                    'options' => [
                        ['value' => 0, 'label' => 'No'],
                        ['value' => 1, 'label' => 'Yes'],
                    ],
                    'tooltip'=>'If choose Yes, review box will be hidden in post. You can insert it with shortcodes [review] or [wpsm_scorebox].',
                ]),
                $template->register_field('Set overall score', 'review_post_score_manual', ['tooltip'=>'Enter overall score of review (e.g. 5.5) or leave blank to auto calculation based on criterias score.']),
            ]);
            
            $criterias_fields = array_merge($criterias_fields, [
                $template->register_field('Criteria Name', 'name'),
                $template->register_field('Criteria Score', 'score'),
            ]);
        }

        if(defined('\ContentEgg\PLUGIN_PATH') && in_array($mapper, ['woocommerce-product', 'post'], true)){
            $ce_fields = array_merge($ce_fields, [
                $template->register_field('Offer URL (required)', 'ce_orig_url', ['tooltip' => 'Required for Content Egg offer',]),
                $template->register_field('Offer title (required)', 'ce_title', ['tooltip' => 'Required for Content Egg offer',]),
                $template->register_field('Unique Offer ID', 'ce_unique_id', ['tooltip'=> 'Will be used to detect offer id inside product for updates']),
                $template->register_field('Offer description', 'ce_description', []),
                $template->register_field('Offer image', 'ce_img', []),
                $template->register_field('Offer price', 'ce_price', []),
                $template->register_field('Offer Old price', 'ce_priceOld', []),
                $template->register_field('Offer currency', 'ce_currencyCode', ['tooltip'=>'Currency in ISO 4217. This is only for schema markup. Example: USD or EUR.']),
                $template->register_field('Offer Group', 'ce_group', []),
                $template->register_field('Merchant Name', 'ce_merchant', ['tooltip'=>'Will be used as name of the Seller']),
                $template->register_field('Merchant Domain', 'ce_domain', ['tooltip'=>'Will be used for parsing Seller logo']),
                $template->register_field('Merchant Logo URL', 'ce_logo', ['tooltip'=> 'Can be used to dispaly a Seller logo for shortcodes with store logos']),
                $template->register_field('Offer rating', 'ce_rating', ['tooltip'=> 'Set value from 1 to 5']),
                $template->register_field('Deeplink', 'ce_deeplink', []),
                $template->register_field('Xpath', 'ce_priceXpath', []),
                $template->register_field('Period for deleting in days', 'ce_delete_period', ['tooltip'=> 'If you will update your offers after this period, plugin will remove existed offers instead adding and updating them. Remove this field if you want to keep your offers forever']),
            ]);
        }
        
        if (in_array($mapper, ['term'], true)) {
            $offer_fields = array_merge($offer_fields, [
                $template->register_field('Heading Title', 'brand_heading', []),
                $template->register_field('Short description', 'brand_short_description', []),
                $template->register_field('Set url of store', 'brand_url', []),
                $template->register_field('Cashback notice', 'cashback_notice', []),
                $template->register_field('Bottom description', 'brand_second_description', []),
                $template->register_attachment_fields('Store/Brand logo', 'brandimage', 'Url Location', []),
            ]);
        }

        $merged = array_merge($fields, [
            $template->register_group('Rehub Fields', 'offer_fields', $offer_fields)
        ]);

        $merged = array_merge($merged, [
            $template->register_group('Review Score', 'review_fields', $review_fields),
        ]);
        
        $merged = array_merge($merged, [
            $template->register_group('Review criterias', 'criterias_fields', $criterias_fields, ['type' => 'repeatable']),
        ]);

        if(defined('\ContentEgg\PLUGIN_PATH')){
            $merged = array_merge($merged, [
                $template->register_group('Content Egg Fields', 'ce_fields', $ce_fields),
            ]);           
        }
        
        return $merged;
    }

     public function pre_process(ParsedData $data, ImporterModel $importer_model, Template $template)
    {
        $mapper = $template->get_mapper();
        
        switch ($mapper) {
            case 'term':
                $field_map = [
                    'brand_heading' => 'offer_fields.brand_heading',
                    'brand_short_description' => 'offer_fields.brand_short_description',
                    'brand_url' => 'offer_fields.brand_url',
                    'cashback_notice' => 'offer_fields.cashback_notice',
                    'brand_second_description' => 'offer_fields.brand_second_description',
                    'brandimage' => 'offer_fields.brandimage',
                ];
                break;
            default:
                $field_map = [
                    //'rehub_offer_name' => 'offer_fields.offer_name',
                    'rehub_offer_product_url' => 'offer_fields.rehub_offer_product_url',
                    'rehub_offer_product_desc' => 'offer_fields.rehub_offer_product_desc',
                    'rehub_offer_product_price' => 'offer_fields.rehub_offer_product_price',
                    'rehub_offer_product_price_old' => 'offer_fields.rehub_offer_product_price_old',
                    'rehub_offer_btn_text' => 'offer_fields.rehub_offer_btn_text',
                    'rehub_offer_product_coupon' => 'offer_fields.rehub_offer_product_coupon',
                    'rehub_offer_coupon_date' => 'offer_fields.rehub_offer_coupon_date',
                    '_import_offer_date_format' => 'offer_fields.rehub_offer_coupon_date_format',
                    'rehub_offer_coupon_mask' => 'offer_fields.rehub_offer_coupon_mask',
                    'rehub_offer_disclaimer' => 'offer_fields.rehub_offer_disclaimer',
                    'rehub_offer_discount' => 'offer_fields.rehub_offer_discount',
                    '_notice_custom' => 'offer_fields.rehub_notice_custom',
                    'rehub_offer_product_thumb' => 'offer_fields.rehub_offer_product_thumb',
                    'rehub_offer_logo_url' => 'offer_fields.rehub_offer_logo_url',
                    '_post_layout' => 'offer_fields.rehub_post_layout',
                    'rehub_woo_coupon_code' => 'offer_fields.rehub_woo_coupon_code',//Woo starts here
                    'rehub_woo_coupon_date' => 'offer_fields.rehub_woo_coupon_date',
                    'rehub_woo_coupon_logo_url' => 'offer_fields.rehub_woo_coupon_logo_url',
                    '_import_woo_date_format' => 'offer_fields.rehub_woo_coupon_date_format',
                    'rehub_woo_coupon_mask' => 'offer_fields.rehub_woo_coupon_mask',
                    'rehub_woo_coupon_coupon_img_url' => 'offer_fields.rehub_woo_coupon_coupon_img_url',
                    'rh_code_incart' => 'offer_fields.rh_code_incart',
                    'rehub_woodeals_short' => 'offer_fields.rehub_woodeals_short',
                    '_rh_woo_product_layout' => 'offer_fields.rehub_product_layout',
                ];
                $ce_map = [
                    'orig_url' => 'ce_fields.ce_orig_url',
                    'title' => 'ce_fields.ce_title',
                    'unique_id' => 'ce_fields.ce_unique_id',
                    'description' => 'ce_fields.ce_description',
                    'img' => 'ce_fields.ce_img',
                    'price' => 'ce_fields.ce_price',
                    'priceOld' => 'ce_fields.ce_priceOld',
                    'currencyCode' => 'ce_fields.ce_currencyCode',
                    'group' => 'ce_fields.ce_group',
                    'merchant' => 'ce_fields.ce_merchant',
                    'domain' => 'ce_fields.ce_domain',
                    'logo' => 'ce_fields.ce_logo',
                    'rating' => 'ce_fields.ce_rating',
                    'deeplink' => 'ce_fields.ce_deeplink',
                    'priceXpath' => 'ce_fields.ce_priceXpath',
                    'deleteperiod' => 'ce_fields.ce_delete_period',
                ];
                $review_map = [
                    'review_post_heading' => 'review_fields.review_heading',
                    'review_post_summary_text' => 'review_fields.review_summary',
                    'review_post_pros_text' => 'review_fields.review_post_pros',
                    'review_post_cons_text' => 'review_fields.review_post_cons',
                    'review_post_product_shortcode' => 'review_fields.review_shortcode',
                    'review_post_score_manual' => 'review_fields.review_post_score_manual',
                ];
                break;
        }
        
        //Rehub fields presave
        $offer_field_map = [];
        foreach ($field_map as $key => $value) {    
            if (true !== $importer_model->isEnabledField($value)) {
                continue;
            }   
            if($key == '_import_offer_date_format'){
                $offer_field_map['rehub_offer_coupon_date'] = $this->import_date_format($data->getValue('offer_fields.rehub_offer_coupon_date', 'offer_fields'), $data->getValue('offer_fields.rehub_offer_coupon_date_format', 'offer_fields'));
                $post_date = (!empty($data->getValue('post.post_date', 'default'))) ? $data->getValue('post.post_date', 'default') : '';
                if($post_date){
                    $post_data = $data->getData('default');
                    $post_data['post.post_date'] = $this->import_date_format($post_date, $data->getValue('offer_fields.rehub_offer_coupon_date_format', 'offer_fields'), 'post');
                    $data->update($post_data, 'default');
                }
            }
            elseif($key == '_import_woo_date_format'){
                $offer_field_map['rehub_woo_coupon_date'] = $this->import_date_format($data->getValue('offer_fields.rehub_woo_coupon_date', 'offer_fields'), $data->getValue('offer_fields.rehub_woo_coupon_date_format', 'offer_fields'));
                $post_date = (!empty($data->getValue('post.post_date', 'default'))) ? $data->getValue('post.post_date', 'default') : '';
                if($post_date){
                    $post_data = $data->getData('default');
                    $post_data['post.post_date'] = $this->import_date_format($post_date, $data->getValue('offer_fields.rehub_woo_coupon_date_format', 'offer_fields'), 'post');
                    $data->update($post_data, 'default');
                }
            }
            elseif (in_array($key, ['brandimage'], true)) { //We check all available image fields and save object as array
                $image_data = $data->getData('offer_fields');
                $attachment = [];
                foreach ($image_data as $field => $field_value) {
                    if (preg_match('/^offer_fields\.' . $key . '\.(\S+)$/', $field, $matches) !== 1) {
                        continue;
                    }
                    $attachment[$matches[1]] = $field_value;
                }
                $offer_field_map[$key] = $attachment;
            } 
            else{
                $offer_field_map[$key] = $data->getValue($value, 'offer_fields');
            }
        }
        $data->replace($offer_field_map, 'offer_fields');

        //CE Presave fields
        if(defined('\ContentEgg\PLUGIN_PATH')){
            $ce_field_map = [];
            foreach ($ce_map as $key => $value) {
                if (true !== $importer_model->isEnabledField($value)) {
                    //continue;
                } 
                if($key == 'priceXpath'){
                    $ce_field_map['extra']['priceXpath'] = $data->getValue('ce_fields.ce_priceXpath', 'ce_fields');
                }elseif($key == 'deeplink'){
                    $ce_field_map['extra']['deeplink'] = $data->getValue('ce_fields.ce_deeplink', 'ce_fields');
                }elseif($key == 'ce_delete_period'){
                    $ce_field_map['deleteperiod'] = (int)$data->getValue('ce_fields.ce_delete_period', 'ce_fields');
                }else{
                    $ce_field_map[$key] = $data->getValue($value, 'ce_fields');
                }        
            }
            if(isset($ce_field_map['rating']) && (int)$ce_field_map['rating'] > 4){
                $ce_field_map['rating'] = 5;
            }
            if(empty($ce_field_map['unique_id']) && !empty($ce_field_map['orig_url'])) {
                $ce_field_map['unique_id'] = substr(md5($ce_field_map['orig_url']), 0, 9);
            }
            if(empty($ce_field_map['extra'])){
                $ce_field_map['extra'] = array('deeplink' => '');
            }
            $ce_field_map['last_update'] = time();
            $data->replace($ce_field_map, 'ce_fields');
        }

        //Review fields presave
        $review_field_map = [];
         foreach ($review_map as $key => $value) {
            if (true !== $importer_model->isEnabledField($value)) {
                continue;
            }
            $review_field_map[$key] = $data->getValue($value, 'review_fields');
         }
         $data->replace($review_field_map, 'review_fields');

        return $data;
    }

    /*  */
    public function process($id, ParsedData $data, ImporterModel $importer_model, Template $template)
    {
        $mapper = $template->get_mapper();
    
        switch ($mapper) {
            case 'term':
                $this->process_term($id, $data, $importer_model, $template);
                break;
            default:
                $this->process_post($id, $data, $importer_model, $template);
                break;
        }

        return $id;
    }

    /*  */
    public function process_post($id, ParsedData $data, ImporterModel $importer_model, PostTemplate $template)
    {
        // Rehub fields
        $meta = $data->getData('offer_fields');
        //rh_logger($meta, '$meta');
        foreach ($meta as $key => $value) {
            update_post_meta($id, $key, $value);
        }
        if(!empty($meta['_post_layout']) || !empty($meta['_notice_custom'])){
            $rehub_post_side_fields = array( '_notice_custom', '_post_layout', 'post_size', 'is_editor_choice', 'show_featured_image', 'disable_parts', 'show_banner_ads' );
            update_post_meta($id, 'rehub_post_side_fields', $rehub_post_side_fields);
        }

        //CE fields
        if(defined('\ContentEgg\PLUGIN_PATH')){
            $cemeta = $data->getData('ce_fields');
            //rh_logger($cemeta, '$cemeta');
            if(!empty($cemeta['title']) && !empty($cemeta['orig_url']) && !empty($cemeta['unique_id']) ){
                $uniqueid = $cemeta['unique_id'];
                $setnewdata = false;
                if(!empty($cemeta['deleteperiod'])){
                    $last_update = get_post_meta($id, '_cegg_last_update_Offer', true);
                    $current_date = $cemeta['last_update'];
                    $days_for_delete = $cemeta['deleteperiod'] * 86400;
                    $date_for_delete = $days_for_delete + $last_update;
                    if($current_date > $date_for_delete){
                        $setnewdata = true;
                        $offer_data = array();
                    }
                }
                if(!$setnewdata){$offer_data = \ContentEgg\application\components\ContentManager::getData($id, 'Offer');}
                $offer_data[$uniqueid] = $cemeta;
                \ContentEgg\application\components\ContentManager::saveData($offer_data, 'Offer', $id);

                update_post_meta($id, '_cegg_last_update_Offer', $cemeta['last_update']);

            }
        }

        // Review fields
        $review_fields = $data->getData('review_fields');
        $review_criteria_overall = $total_counter = 0;
        $postscore = '';
        
        if( !empty($review_fields['review_post_heading']) || !empty($review_fields['review_post_pros_text']) || !empty($review_fields['review_post_score_manual'])){
            $review_array = [];
            $review_subarray = array (
                'review_post_heading' => '',
                'review_post_summary_text' => '',
                'review_post_pros_text' => '',
                'review_post_cons_text' => '',
                'review_post_product_shortcode' => '',
                'review_post_score_manual' => '',
                'review_post_criteria' => array(),
            );
            
            $review_fields['review_post_criteria'] = $this->get_review_criterias($data);

            if($importer_model->getTemplate() == 'post'){
                $review_array[] = array_merge($review_subarray, $review_fields);
                $review_post_fields = [
                    'rehub_framework_post_type' => 'review',
                    'rehub_post_fields' => [ 'rehub_framework_post_type', 'video_post', 'gallery_post', 'review_post', 'music_post' ],
                    'review_post' => $review_array,
                ];

                foreach($review_post_fields as $review_post_field => $review_post_value ){
                    update_post_meta($id, $review_post_field, $review_post_value);
                }

                // Collect Review criteria data
                if( !empty($review_fields['review_post_criteria'] ) ) {
                    $review_post_criteria = $review_fields['review_post_criteria'];
                    foreach($review_post_criteria as $index=>$value){
                        if ($value['review_post_score'] == '' || $value['review_post_score'] == ' '){
                            $value['review_post_score'] = '0';
                        }
                        $review_criteria_overall += $value['review_post_score'];
                        $total_counter ++;
                        update_post_meta( $id, '_review_score_criteria_'.$total_counter, sanitize_text_field( $value['review_post_score']));
                    }
                }

                // Get Overall score
                if ( !empty( $review_fields['review_post_score_manual'] ) ) {
                    $postscore = (float)$review_fields['review_post_score_manual'];
                } else {
                    if ( $review_criteria_overall !=0 && $total_counter !=0 ) {
                        $prepostscore = $review_criteria_overall / $total_counter;
                        $postscore = round($prepostscore, 1);
                    }
                }

                // Update Overall score
                if( $postscore ) {
                    update_post_meta( $id, 'rehub_review_overall_score', $postscore );
                }

                //rh_loger($postscore, 'model');

            }
            if($importer_model->getTemplate() == 'woocommerce-product'){
                $review_array = array_merge($review_subarray, $review_fields);

                $fields = array();
                if( !empty($review_array['review_post_score_manual'] ) ) {
                    update_post_meta( $id, '_review_post_score_manual', sanitize_textarea_field( $review_array['review_post_score_manual'] ) );
                    $fields[] = '_review_post_score_manual';
                }
                if( !empty($review_array['review_post_heading'] ) ) {
                    update_post_meta( $id, '_review_heading', sanitize_text_field( $review_array['review_post_heading'] ) );
                    $fields[] = '_review_heading';
                }
                if( !empty($review_array['review_post_summary_text'] ) ) {
                    update_post_meta( $id, '_review_post_summary_text', sanitize_textarea_field( $review_array['review_post_summary_text'] ) );
                    $fields[] = '_review_post_summary_text';
                }
                if( !empty($review_array['review_post_pros_text'] ) ) {
                    update_post_meta( $id, '_review_post_pros_text', sanitize_textarea_field( $review_array['review_post_pros_text'] ) );
                    $fields[] = '_review_post_pros_text';
                }
                if( !empty($review_array['review_post_cons_text'] ) ) {
                    update_post_meta( $id, '_review_post_cons_text', sanitize_textarea_field( $review_array['review_post_cons_text'] ) );
                    $fields[] = '_review_post_cons_text';
                }
                if( !empty($review_array['review_post_product_shortcode'] ) ) {
                    update_post_meta( $id, 'review_woo_shortcode', sanitize_textarea_field( $review_array['review_post_product_shortcode'] ) );
                    $fields[] = 'review_woo_shortcode';
                }

                // Collect Review criteria data
                if( !empty($review_array['review_post_criteria'] ) ) {
                    $review_post_criteria = $review_array['review_post_criteria'];
                    foreach($review_post_criteria as $index=>$value){
                        if ($value['review_post_score'] == '' || $value['review_post_score'] == ' '){
                            $value['review_post_score'] = '0';
                        }
                        $review_criteria_overall += $value['review_post_score'];
                        $total_counter ++;
                        update_post_meta( $id, '_review_score_criteria_'.$total_counter, sanitize_text_field( $value['review_post_score']));
                    }
                    $review_post_s_array = rh_serialize_data_review( $review_post_criteria );
                    update_post_meta( $id, '_review_post_criteria', $review_post_s_array );
                    $fields[] = '_review_post_criteria';
                }

                // Get Overall score
                if ( !empty( $review_array['review_post_score_manual'] ) ) {
                    $postscore = (float)$review_array['review_post_score_manual'];
                } else {
                    if ( $review_criteria_overall !=0 && $total_counter !=0 ) {
                        $prepostscore = $review_criteria_overall / $total_counter;
                        $postscore = round($prepostscore, 1);
                    }
                }

                // Update Overall score
                if( $postscore ) {
                    update_post_meta( $id, 'rehub_review_overall_score', $postscore );
                }
                // Add Metabox fields to DB
                update_post_meta( $id, 'rehub_review_woo_fields', rh_serialize_data_review( $fields ) ); 
            }
        }

    }
    
    /*  */
    public function process_term($id, ParsedData $data, ImporterModel $importer_model, Template $template)
    {
        $meta = $data->getData('offer_fields');
        if (!empty($meta['brandimage'])) {

            /**
             * @var Filesystem $filesystem
             */
            $filesystem = Container::getInstance()->get('filesystem');

            /**
             * @var Ftp $ftp
             */
            $ftp = Container::getInstance()->get('ftp');

            /**
             * @var Attachment $attachment
             */
            $attachment = Container::getInstance()->get('attachment');

            $attachment_ids = $template->process_attachment($id, $meta['brandimage'], '', $filesystem, $ftp, $attachment);
            if (!empty($attachment_ids)) {
                $image_id = array_shift($attachment_ids);
                $image_url = wp_get_attachment_url($image_id);
                $meta['brandimage'] = $image_url;
            }
        }
        foreach ($meta as $key => $value) {
            update_term_meta($id, $key, $value);
        }

    }

    public function import_date_format($date, $option, $post_date = false) {
        $date = trim($date);
        if (!$date) return '';
        
        if ( $option == 1 ){
            $new_date = date_create_from_format( 'd/m/Y', $date );
            if( !$new_date ) return '';
        }
        elseif( $option == 2 ){
            $new_date = date_create_from_format( 'd/m/y', $date  );
            if( !$new_date ) return '';         
        } 
        elseif( $option == 3 ){
            $new_date = date_create_from_format( 'Y-m-d H:i:s', $date  );
            if( !$new_date ) return '';         
        }
        elseif( $option == 4 ){
            $new_date = date_create_from_format( 'd/m/Y H:i:s', $date  );
            if( !$new_date ) return '';         
        }
        else{
            return $date;   
        }
        if( $post_date == 'post' ){
            return date_format($new_date, 'Y-m-d H:i:s');
        }
        return date_format($new_date, 'Y-m-d');
    }

    public function get_review_criterias(ParsedData $data) {

        $group_name = 'criterias_fields';
        $raw_criterias = $data->getData($group_name);
        $row_count = isset($raw_criterias[$group_name . '._index']) ? intval($raw_criterias[$group_name . '._index']) : 0;
        
        $review_criterias = [];
        
        for ($i = 0; $i < $row_count; $i++) {
            $prefix = $group_name . '.' . $i . '.';
            $criteriavalue = $raw_criterias[$prefix .'score'];
            if (strpos($criteriavalue, '-') !== false){
                $randarray = explode('-', $criteriavalue);
                $rand1 = (float)$randarray[0];
                $rand2 = (float)$randarray[1];
                $criteriavalue = mt_rand($rand1, $rand2);
            }
            $row = [
                'review_post_name' => $raw_criterias[$prefix .'name'],
                'review_post_score' => $criteriavalue
            ];

            $review_criterias[] = $row;
        }

        return $review_criterias;
    }

}
