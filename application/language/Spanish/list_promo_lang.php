<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//****************global******************
$lang['no_permission'] = 'You have no permission to see this page';
$lang['promotion_listing_title'] = 'Promotion Templates';
$lang['create_new_promotion'] = 'Create New Promotion';
$lang['show_all'] = 'Show All';
$lang['filter_active'] = 'Filter Active';
$lang['search_by_promo_name'] = 'Search by Promotion Name';
$lang['something_wrong'] = "Something went wrong";
$lang['from'] = 'From';
$lang['to'] = 'To';
$lang['chart_live_result_title'] = 'Live Results';
$lang['users'] = 'Users';
$lang['last_21_days'] = 'Last 21 days';
$lang['last_28_days'] = 'Last 28 days';
$lang['live_result'] = 'Live Results';
$lang['users'] = 'Users';

//*************listing promotion table**********************
$lang['name'] = 'Name';
$lang['uc_description'] = 'Description';
$lang['from'] = 'From';
$lang['to'] = 'To';
$lang['brand'] = 'Brand';
$lang['language'] = 'Language';
$lang['email_setting'] = 'Email Setting';
$lang['published'] = 'Published';
$lang['view_promotion'] = 'View Promotion';
$lang['edit'] = 'Edit';
$lang['pause_promotion'] = 'Pause Promotion';
$lang['publish_promotion'] = 'Publish Promotion';
$lang['choose_audience'] = 'Choose your audience';
$lang['override_promotion'] = 'Override Promotion';
$lang['confirm_title'] = 'Confirm Override';
$lang['view_stats'] = 'View stats';
$lang['see_spam_score'] = 'See Spam Score';
$lang['send_test_email_spam'] = 'Send Test Email Spam';
$lang['send_test_email'] = 'Send Test Email';
$lang['no_promo_for_this_brand'] = 'There is no promotion for this brand';
$lang['last'] = 'Last';
$lang['days'] = 'days';
$lang['use_comma_as_separator'] = 'For more recipients use comma as separator';
$lang['select_campaign_code'] = 'Select Campaign Code'; 
$lang['override_confirm'] = 'This will swap any scheduled retention mails for this promotion and in some cases mean a user will get both ECRM and this promotion</br>
Continue?';
    
//*************pop up text**********************
$lang['promotion_template_title'] = 'Promotion Template';
$lang['send_test_promotion'] = 'Send Test Promotion';
$lang['send_spam_email_test_promotion'] = 'Send Spam Test Promotion';
$lang['email'] = 'Email';
$lang['select_currency'] = 'Select Currency';
$lang['send_test'] = 'send test';
$lang['promotion_statistic_popup_title'] ='Promotion Statistic';
$lang['duplicate_promotion_popup_title'] = 'Duplicate Promotion';
$lang['audience_selection_popup_title'] ='Audience Selection';
$lang['no_stats_for_promo'] ="There is no stats for this promotion";
$lang['description'] = 'description';
$lang['pst_rule'] = 'pst rule';
$lang['error'] = 'Error';
$lang['warning'] = 'Warning';
$lang['success'] = 'Success';
$lang['info'] = 'Information';
$lang['failed'] = 'Failed';
$lang['close'] = 'Close';
$lang['copy'] = 'Copy';
$lang['submit'] = 'Submit';
$lang['save'] = 'Save';
$lang['delete'] = 'Delete';
$lang['cancel'] = 'Cancel';
$lang['sent'] = 'Sent';
$lang['popup_create_button'] = 'Create';
$lang['popup_cancel_button'] = 'Cancel';
$lang['failed_page_graph'] = 'Failed to get page graph';

$lang['sent_template_by_hour'] = 'Sent Ecrm Template today by hour and minute';
$lang['sent_promo_by_brand_hour'] = 'Sent Promotion today by hour and minute';
$lang['to_date_greater_than_from_date'] =  "This date must be greater than the From date";

$lang['new_template_title'] = 'New Template For';
$lang['new_template_description'] = 'Create the template for';
$lang['select_language'] = 'Select Language';

//*************Create promotion view file**********************
$lang['edit_promotion'] = 'Edit Promotion Template';
$lang['create_promotion'] = 'Create Promotion Template';
$lang['update'] = 'Update';
$lang['add_section'] = 'Add Section';
$lang['email_promo_settings'] = 'Email Promotion Settings';
$lang['template_name'] = 'Template Name';
$lang['template_description'] = 'Template Description';
$lang['desc_placeholder'] = 'description';
$lang['template_preheader'] = 'Preheader [preHeader]';
$lang['preheader_placeholder'] = 'preheader';
$lang['email_subject'] = 'Email Subject ';
$lang['subject_placeholder'] = 'Subject Line';
$lang['campaign_code'] = 'Campaign Code';
$lang['page_title'] = 'Email page title [pageTitle](Max 60 Characters)';
$lang['pagetitle_placeholder'] = 'Page Title';
$lang['page_title_span'] = 'HTML page title, used for alt tags too';
$lang['group_id'] = 'Add user to Group ID';
$lang['groupid_placeholder']='Add User to Group ID';
$lang['schedule_date'] = 'Schedule dates';
$lang['sent_on'] = 'Sent On Date & Time';
$lang['from_date'] = "from Date";
$lang['from_time'] = "from Time";
$lang['not_sent_after'] = 'Do Not Send After Date & Time';
$lang['to_date'] = "to Date";
$lang['to_time'] = "to Time";
$lang['valid_time_format'] = 'Enter time by in valid format HH:mm:ss';
$lang['reset']='Reset';
$lang['apply']='Apply';
$lang['save_add_new_section'] = 'Save and Add New Section';

//*************Add new section view file  **********************
$lang['add_new_section_title'] = 'Add New Section for Promotion Template';
$lang['add_section'] = 'Add section';

//*************Promotion controller file  **********************
$lang['successfully_added_new_section'] = 'New section was added successfully';
$lang['section_was_not_saved'] = 'Section was not saved, try again!';
$lang['successfully_updated'] = 'Template Updated successfully';
$lang['validation_error'] = 'Validation error';
$lang['successfully_paused_promo'] = 'Promotion was paused successfully';
$lang['successfully_deleted_section'] = 'Section deleted successfully';
$lang['unsuccessfully_deleted_section'] = 'Section was not deleted cleanly if at all!';
$lang['successfully_deleted_promo'] = 'Promotion deleted successfully';
$lang['unsuccessfully_deleted_promo'] = 'Promotion was not deleted cleanly if at all!';
$lang['successfully_published_promo'] = 'Promotion published successfully';


//*************Create promotion js file **********************
$lang['required_title'] = 'Title is required';
$lang['required_description'] = 'Description is required';
$lang['required_subject'] = 'Subject is required';
$lang['required_preheader'] = 'PreHeader is required';
$lang['required_pagetitle'] = 'Page Title is required with no more than 60 charcters';
$lang['required_fromdate'] = 'From Date is required';
$lang['required_todate'] = 'To Date is required';
$lang['alphanumeric_group_id'] = 'Only alphanumeric string is allowed as group ID';
$lang['to_date_not_smaller_than_from_date'] = "To date can not be smaller then date from";
$lang['to_date_not_smaller_than_today'] = "To date can not be smaller then date today";
$lang['first_save_section'] ='Please first save section!';
$lang['paste_code'] = 'Paste Your Code';
$lang['cta'] = 'CTA Redirection URL';
$lang['hero'] = 'Hero Image Redirection URL';
$lang['are_you_sure_to_delete'] ="Are you sure that you want to delete this Section.<br>It cannot be undone.";
$lang['promotions_not_sent_on'] = 'Promotion wont be sent on';
$lang['because_of_unvalid_email'] = "because is not valid email address";
$lang['duplicate_successed'] = "This promotion was successufull copy to choosen brands!";
$lang['domains_not_in_whitelisted'] = "Some of the domains are not in whitelisted address and test emails won't be sent on those emails";
$lang['domain_not_safe'] = "Domain not safe ";
$lang['are_you_sure_to_pause'] = "Are you sure that you want to pause this promotion.";
$lang['are_you_sure_to_publish'] ="Are you sure that you want to publish this promotion.";
$lang['your_section_body'] = 'Your section body goes here.';

//*************Audience Selection view file**********************
$lang['all_active_users'] = 'All Active users';
$lang['all_subscribed_with_active_email'] = 'All subscribed users with active email';
$lang['total'] = 'Total';
$lang['custom_audience'] = 'Custom audience';
$lang['users_by'] = 'Users By';
$lang['ecrm_category'] = 'ECRM Category';
$lang['currency'] = 'Currency';
$lang['country'] = 'Country';
$lang['gender'] = 'Gender';
$lang['deposit_amount'] = 'Deposit amount';
$lang['filter'] = 'Filter';
$lang['estimate_sending_range'] = 'Estimate sending range';
$lang['of'] = 'of';
$lang['done'] = 'DONE';
$lang['no_users_for_this_criteria'] = 'There is no users for your criteria!';
$lang['paste_sql'] = 'Paste SQL';
$lang['sql_placeholder'] = 'Type your SQL';
$lang['successfully_added_audience'] = 'Your Audience were saved successfully';
$lang['unsuccessfully_added_audience'] = 'Your Audience were not saved successfully';
$lang['promo_list'] = 'Promotion List';
$lang['count_users'] = 'Count Users';
$lang['users_for_this_criteria_found'] = 'users for this criteria';

//*****************Score Spam*************
$lang['popup_spam_score_button'] = 'spam score';
$lang['score_spam_popup_title'] = 'Score Spam';
$lang['pst_rule'] = 'pst rule';
$lang['spam_email_validation'] = 'Valid Email address is required and only for one email you can check spam score !';


