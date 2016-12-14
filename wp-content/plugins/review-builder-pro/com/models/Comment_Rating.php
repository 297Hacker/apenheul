<?php

global $sgrb;
$sgrb->includeModel('Model');
$sgrb->includeModel('Comment');

class SGRB_Comment_RatingModel extends SGRB_Model
{
	const TABLE = 'comment_rating';
	protected $id;
	protected $comment_id;
	protected $category_id;
	protected $rate;

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
					`comment_id` INT(10) unsigned NOT NULL,
					`category_id` int(10) unsigned NOT NULL,
					`rate` tinyint(4) NULL,
					 PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
		$wpdb->query($query);
	}

	public static function alterTable()
	{
		global $sgrb;
		global $wpdb;
		$tablename = $sgrb->tablename(self::TABLE);
		$query = "ALTER TABLE $tablename ADD FOREIGN KEY (`comment_id`) REFERENCES $tablename(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
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
