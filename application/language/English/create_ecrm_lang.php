<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//****************global******************
$lang['no_permission'] = 'You have no permission to see this page';
$lang['edit_template'] = 'Edit Template';
$lang['create_template'] = 'Create Template';
$lang['paste_code'] = 'Paste Your Code';
$lang['allow_sms'] = 'Allow SMS';
$lang['no_permission_to_change_this'] = 'You have no permission to change this';
$lang['sms_no_longer_140'] = 'SMS not longer than 140 character';
$lang['character_left'] = 'character left';
$lang['sms_daily_limit'] = 'SMS has a daily limit of ';
$lang['no_budget_set'] = 'No budget set for the SMS.';
$lang['email_template_settings'] = 'Email Template Settings';
$lang['template_name'] = 'Template Name';
$lang['required'] = 'Required';
$lang['name'] = 'Name';
$lang['template_description'] = 'Template Description';
$lang['description'] = 'Description';
$lang['preheader'] = 'Preheader [preHeader]';
$lang['pre_header'] = 'Preheader';
$lang['email_subject'] = 'Email Subject';
$lang['subject_line'] = 'Subject Line';
$lang['add_more_subject'] = 'Add more subject';
$lang['add'] = 'Add';
$lang['aditional_subject'] = 'Aditional Subject';
$lang['delete'] = 'Delete';
$lang['email_page_title'] = 'Email page title [pageTitle](Max 60 Characters)';
$lang['page_title'] = 'Page Title';
$lang['email_sender'] = 'Email sender [sender]';
$lang['sender_name'] = 'Sender Name';
$lang['target_url'] = 'Target URL';
$lang['target_utl_placeholder'] = "ex: '/landing/bonus.html'";
$lang['campaign_code_title'] = 'Campaign Code';
$lang['campaign_code_placeholder'] = 'Enter the campaign code';
$lang['add_user_to_group'] = 'Add user to Group ID';
$lang['limit_to_date_range'] = 'Limit this template to a date range';
$lang['from'] = 'From';
$lang['to'] = 'To';
$lang['set_button'] = 'Set';
$lang['send_button'] = 'Send';
$lang['reset_button'] = 'Reset';
$lang['copy_button'] = 'Copy';
$lang['submit_button'] = 'Submit';
$lang['save_button'] = 'Save';
$lang['history_button'] = 'History';
$lang['close_button'] = 'Close';
$lang['popup_cancel_button'] = 'Cancel';
$lang['send_test_button'] = 'send test';
$lang['template_view'] = 'Template View';
$lang['send_test_email'] = 'Send Test Mail';
$lang['email_title'] = 'Email';
$lang['something_wrong'] = 'Something went wrong';
$lang['successfully_upload_image'] = 'Image upload successfully.';

//********************global master template *****************
$lang['edit_master_template'] = 'Edit Master Template';
$lang['create_master_template'] = 'Create Master Template';
$lang['header'] = "Header";
$lang['footer'] = "Footer";
$lang['sender'] = "Sender";
$lang['sender_toggle'] = "The email address ex. sender@yourdomain and this appears at the end of email message.";
$lang['domain'] = "Domain";
$lang['domain_toggle'] = "Where your website is publicly found, used to build links and references to your site in email messages and links.";
$lang['datastore'] = "Data Store";
$lang['datastore_toggle'] = "The URL of the location where your images are served from, CDN or server.";
$lang['company'] = "Company";
$lang['company_toggle'] = "Used for the company name in variable format [constantCompany].";
$lang['facebook'] = "Facebook";
$lang['facebook_toggle'] = "Do you have a Facebook page? Enter the page URL here and then include it in your emails.";
$lang['twitter'] = "Twitter";
$lang['twitter_toggle'] = "Enter the link to your twitter feed here.";
$lang['google'] = "Google";
$lang['google_toggle'] = "Do you have a Google page? Enter the page URL here and then include it in your emails";
$lang['terms'] = "Terms and Conditions";
$lang['terms_toggle'] = "The URL of your terms and conditions page, shown in the footer of emails normally";
$lang['contact'] = "Contact";
$lang['contact_toggle'] = "The URL of your contact page.";
$lang['unsub'] = "Unsub";
$lang['unsub_toggle'] = "The URL of your opt-out email page.";
$lang['forgot'] = "Forgot";
$lang['forgot_toggle'] = "The URL of the page where a subscribed user can reset their password.";
$lang['offline'] = "Offline/view as webpage";
$lang['offline_toggle']="The link to the web page where the user can view this content as a web page.";
$lang['save_master'] = 'Save it as Master Template';
$lang['example'] = 'eg';
$lang['apply'] = "Apply";

//*************pop up text**********************
$lang['error'] = 'Error';
$lang['warning'] = 'Warning';
$lang['success'] = 'Success';
$lang['info'] = 'Information';
$lang['create_master_first'] = 'You will not be able to save this until you create a master template for this language';
$lang['are_deleting_additional_subject'] = "Are you sure that you want to delete this additional subject line.<br>It cannot be undone.";
$lang['additional_subject_succssesfully_deleted'] = "Additional Subject line was succssesfully deleted";
$lang['email_wont_be_sent']  = "This template wont be sent on";
$lang['because_of_unvalid_email'] = "because is not valid email address";
$lang['domains_not_in_whitelisted'] = "Some of the domains are not in whitelisted address and test emails won't be sent on those emails";
$lang['domain_not_safe'] = "Domain not safe";
$lang['sms_for_this_brand_is_not_allowed'] = 'This Brand is not allowed for sendind sms!';

//**************************submit Paste Code Template *************
$lang['required_title'] = 'Title is required';
$lang['required_description'] = 'Description is required';
$lang['required_subject'] = 'Subject is required';
$lang['required_preheader'] = 'PreHeader is required';
$lang['required_page_title'] = 'Page Title is required with no more than 60 characters';
$lang['required_from_date'] = 'From date is required';
$lang['required_to_date'] = 'To date is required';
$lang['error_campaign_code'] = 'Error in Campaign code';
$lang['alphanumeric_campaign_code'] = 'Only alphanumeric string is allowed as Campaign Code';
$lang['error_group_id'] = 'Error in Group Id';
$lang['alphanumeric_group_id'] = 'Only alphanumeric string is allowed as group ID';
$lang['error_target_url'] = 'Error in target url';
$lang['alphanumeric_target_url'] = 'Only alphanumeric string and forward slash is allowed as target url';

//*********************************
$lang['additional_subject_not_saved'] = 'Additionals subjects are not saved, something went wrong!';
$lang['template_successfully_created'] = 'Template was created, but note that master template for selected brand and language does not exist if you want to use master in your choosen language please go in Master Template and create a Master Template in same language as your eCRM Template';
$lang['additional_subject_not_saved'] ='Additionals subjects are not saved, something went wrong!';
$lang['successfully_updated_template'] = 'Template was successfully updated';

//**********************submit master template*************
$lang['required_sender'] = 'Sender is required';
$lang['required_alphanumeric_sender'] = 'Sender is required and must be alphanumeric';
$lang['required_domain'] = 'Domain must be https and url';
$lang['required_datastore'] = 'Datastore is required and must be url';
$lang['required_facebook'] ='Facebook is required and must be a facebook link';
$lang['required_twitter'] = 'Twitter is required and must be a twitter acount';
$lang['required_google'] = 'Google is required and must be a google plus link';
$lang['required_terms'] = 'Terms is required';
$lang['required_company'] = 'Company is required';
$lang['required_contact'] = 'Contact is required';
$lang['required_unsub'] = 'Unsub is required';
$lang['required_forgot'] = 'Forgot is required';
$lang['required_offline'] = 'Offline is required';
$lang['master_already_exist'] = 'Master for this brand and language already exist, do you want to replace it?';
$lang['master_not_deleted'] = "Something went wrong, master was not deleted";
$lang['old_master_still_in_use'] = 'Old master template for this brand and language is still in use';
$lang['successfully_deleted_master'] = 'Template deleted successfully';
$lang['not_deleted_master'] = 'Template was not deleted cleanly if at all!';
$lang['successfully_updated_master'] = 'Template updated successfully';
$lang['validation_error'] = 'Validation error';
$lang['no_data_for_process'] = 'No Data to process';

//*****************Score Spam*************
$lang['popup_spam_score_button'] = 'spam score';
$lang['score_spam_popup_title'] = 'Score Spam';
$lang['description'] = 'description';
$lang['pst_rule'] = 'pst rule';
$lang['spam_email_validation'] = 'Valid Email address is required and only for one email you can check spam score !';
