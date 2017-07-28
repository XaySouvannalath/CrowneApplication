<?php
    //function Helloworld()
   // {
     //   echo 'Hello world';
   // }
    //function substring
    function subString($str, $start, $end)
    {
        return substr($str, $start, $end);
         
    }
    //
    function dbcon()
    {
        $objConnect = mysql_connect("localhost","root",""); 
        if($objConnect == true)
        {
            mysql_close();
            $objConnect = mysql_connect("localhost","root","");
            mysql_select_db('nbs');
        }  
    }

    function myDatabase()
    {
        mysql_connect("localhost", "root", "");
        mysql_select_db('nbs');
    }
    function insertQuery($sql)
    {
        myDatabase();
        return mysql_query($sql);
    }
    function updateQuery($sql)
    {
        myDatabase();
        return mysql_query($sql);
    }
    function deleteQuery($sql)
    {
         myDatabase();
        return mysql_query($sql);
    }
    function selectQuery($sql)
    {
        myDatabase();
        $objQuery = mysql_query($sql);
        return mysql_fetch_array($objQuery);
    }
	function getAutoID($columnName, $tableName, $idStyle, $indexString)
	{
		myDatabase();
		$autosql = "select $columnName from $tableName order by $columnName desc";
		$objResult = mysql_query($autosql);
		$objValue = mysql_fetch_assoc($objResult); 
		$oldID = $objValue[$columnName];
		$subID = (int)substr($oldID, $indexString) + 1;
		$newID = $idStyle . $subID;
		return $idStyle . str_pad($subID, 3, '0', STR_PAD_LEFT);

	}
?>