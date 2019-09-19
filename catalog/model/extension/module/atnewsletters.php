<?php
class  ModelExtensionModuleatnewsletters extends Model {
	public function createatnewsletter()
	{	
		$res0 = $this->db->query("SHOW TABLES LIKE '".DB_PREFIX."atnewsletter'");
		if($res0->num_rows == 0){
			$this->db->query("
				CREATE TABLE IF NOT EXISTS `". DB_PREFIX. "atnewsletter` (
				  `news_id` int(11) NOT NULL AUTO_INCREMENT,
				  `news_email` varchar(255) NOT NULL,
				  `date_added` DATETIME,
				  PRIMARY KEY (`news_id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			");
		}
	}
	public function subscribes($data) {
		$res = $this->db->query("select * from ". DB_PREFIX ."atnewsletter where news_email='".$data['email']."'");
		
		if($res->num_rows == 1)
		{
			return "Email Already Exist";
		}
		else
		{
		
			if($this->db->query("INSERT INTO " . DB_PREFIX . "atnewsletter(news_email,date_added) values ('".$data['email']."',now())"))
			{
				return "Subscriptions Successfully";
			}
			else
			{
				return "Subscription Fail";
			}
		}
	}	
}