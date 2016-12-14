<?php

global $sgrb;
$sgrb->includeController('Controller');
$sgrb->includeModel('Review');
$sgrb->includeModel('Comment');
$sgrb->includeModel('Category');
$sgrb->includeModel('Template');
$sgrb->includeModel('Comment_Rating');
$sgrb->includeModel('Rate_Log');
$sgrb->includeModel('TemplateDesign');
$sgrb->includeModel('Page_Review');

class SGRB_SetupController extends SGRB_Controller
{
	public static function activate()
	{
		add_option(SG_REVIEW_BANNER, SG_REVIEW_BANNER);
		SGRB_ReviewModel::create();
		SGRB_CommentModel::create();
		SGRB_TemplateModel::create();
		SGRB_TemplateDesignModel::create();
		SGRB_CategoryModel::create();
		SGRB_Comment_RatingModel::create();
		SGRB_Rate_LogModel::create();
		SGRB_Page_ReviewModel::create();
		if (is_multisite()) {
			$sites = wp_get_sites();
			foreach($sites as $site) {
				SGRB_ReviewModel::create();
				SGRB_CommentModel::create();
				SGRB_TemplateModel::create();
				SGRB_TemplateDesignModel::create();
				SGRB_CategoryModel::create();
				SGRB_Comment_RatingModel::create();
				SGRB_Rate_LogModel::create();
				SGRB_Page_ReviewModel::create();
			}
		}

	}

	public static function deactivate()
	{
		
	}

	public static function uninstall()
	{
		global $sgrb;
		global $wpdb;
		$sgrb->includeLib('SgrbWidget');
		unregister_widget("SgrbWidget");
		delete_option('widget_sgrbwidget');
		delete_option('SGRB_VERSION');
		if (get_option('SGRB_SAVE_TABLES')) {
			SGRB_TemplateDesignModel::drop();
			delete_option('SGRB_SAVE_TABLES');
		}
		else {
			SGRB_ReviewModel::drop();
			SGRB_TemplateModel::drop();
			SGRB_TemplateDesignModel::drop();
			SGRB_CategoryModel::drop();
			SGRB_Comment_RatingModel::drop();
			SGRB_CommentModel::drop();
			SGRB_Rate_LogModel::drop();
			SGRB_Page_ReviewModel::drop();
		}
		
		if (is_multisite()) {
			$sites = wp_get_sites();
			foreach($sites as $site) {
				if (get_option('SGRB_SAVE_TABLES')) {
					SGRB_TemplateDesignModel::drop();
					delete_option('SGRB_SAVE_TABLES');
				}
				else {
					SGRB_ReviewModel::drop();
					SGRB_TemplateModel::drop();
					SGRB_TemplateDesignModel::drop();
					SGRB_CategoryModel::drop();
					SGRB_Comment_RatingModel::drop();
					SGRB_CommentModel::drop();
					SGRB_Rate_LogModel::drop();
					SGRB_Page_ReviewModel::drop();
				}
			}
		}
	}

	public static function createBlog()
	{

	}

}
