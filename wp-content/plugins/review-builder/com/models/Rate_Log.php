<?php

global $sgrb;
$sgrb->includeModel('Model');

class SGRB_Rate_LogModel extends SGRB_Model
{
	const TABLE = 'rate_log';
	protected $id;
	protected $review_id;
	protected $comment_id;
	protected $post_id;
	protected $ip;

	public static function finder($class = __CLASS__)
	{
		return parent::finder($class);
	}

	public static function create()
	{
		global $sgrb;
		global $wpdb;
		$tablename = $sgrb->tablename(self::TABLE);

		$query = "CREATE TABLE IF NOT EXISTS $tablename (
					  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
					  `review_id` int(10) unsigned NOT NULL,
					  `comment_id` INT(10) unsigned NULL,
					  `post_id` INT(10) NULL,
					  `ip` varchar(255) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
		$wpdb->query($query);
	}

	public static function alterTable()
	{
		global $sgrb;
		global $wpdb;
		$tablename = $sgrb->tablename(self::TABLE);

		$query = "ALTER TABLE $tablename ADD `comment_id` INT(10) unsigned NULL DEFAULT NULL AFTER `review_id`;";
		$wpdb->query($query);
	}

	public static function drop()
	{
		global $sgrb;
		global $wpdb;
		$tablename = $sgrb->tablename(self::TABLE);
		$query = "DROP TABLE $tablename";
		$wpdb->query($query);
	}
}
