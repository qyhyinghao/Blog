<?php
/**
 * MySQL相关函数
 */

/**
 * 初始化数据库
 * @return [type] [description]
 */
function initDb()
{
	// 连接数据库
	$link = mysql_connect('localhost', 'root', '456789') or die ('数据库链接失败');
	// 选择数据库
	mysql_select_db('blog', $link);
	// 设置数据库编码
	mysql_query("set names utf8");
}

/**
 * 查询一条数据
 * @return 
 */
function findOne($sql){
	$rs = mysql_query($sql);	
	$result = mysql_fetch_array($rs,MYSQL_ASSOC);
	return $result;
}


function findAll($sql ,$showError = false){
	$result = mysql_query($sql);
	
	if(is_resource($result)){
		$rows = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}else{
		return $showError? mysql_error() :false;
	}
}
