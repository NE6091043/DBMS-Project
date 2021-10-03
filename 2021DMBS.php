<!DOCTYPE html>
<html>
    <head>
    </head>
		<h1>醫療資料庫系統</h1>
    	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
		<table>
		<tr>
			<td style="font-size:30px" bgcolor= "00c300" width="25%">查詢工具 </td> 
			<td style="font-size:30px" bgcolor= "e5e5e5">
				<select name="choose">
				<option>選擇功能</option>
				<option value="button"> Button </option>
    			<option value="querry"> Querry </option>
				</select>
			</td>
		</tr>
		<tr>
			<td style="font-size:30px" bgcolor= "ffffff" width="50%">
        		<input type="submit" name="function" value="選擇">
			</td>
		</tr>
		</table>
        </form>
    </body>
</html>

<?PHP
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "2021dbms";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("連線失敗" . $conn->connect_error);
    } 
    
    if(isset($_POST['function'])){

    	if($_POST['choose'] == "button" )
    	{
    		echo '<form action = "#" method="post">
    		<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
			用Button選擇要執行的指令:
			<select name="find">
				<option>選擇指令</option>
    			<option value="Select_From_Where"> Select_From_Where </option>
    			<option value="Delete"> Delete </option>
    			<option value="Insert"> Insert </option>
    			<option value="Update"> Update </option>
    			<option value="In"> In </option>
    			<option value="Not In"> Not In </option>
    			<option value="Exists"> Exists </option>
    			<option value="Not Exists"> Not Exists </option>
    			<option value="Count"> Count </option>
    			<option value="Sum"> Sum </option>
    			<option value="Max"> Max </option>
    			<option value="Min"> Min </option>
    			<option value="Avg"> Avg </option>
    			<option value="Having"> Having </option>
        	</select>
    		<br>
    		<input type="submit" name="button" value="確定">
    		</form>';
    	}

		if($_POST['choose'] == "querry" )
		{
			echo '<form action = "#" method="post">		
					<input type="hidden" name="choose">
    				<input type="hidden" name="submit">
    				<table>
    				<tr>
						<td style="font-size:30px" bgcolor= "9bed9b" width="50%">查詢關鍵字</td>
					</tr>
					</table>
					<textarea name="txtarea" style="width:320px; height:170px;"></textarea>
					<input type="submit" name="textarea" value="輸入">
			</form>';
		}
    }

    if(isset($_POST['button']))
	{
		$ff = $_POST['find'];
		if($ff=="Select_From_Where")
		{
			$sql = "SELECT * FROM 病人 WHERE 身高>170 AND 身高 <190 ORDER BY 身高 DESC";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>病人ID</th>
				<th>病人名字</th>
				<th>年紀</th>
				<th>身高</th>
				<th>體重</th>
				<th>醫師ID</th>
				<th>處方簽ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["病人ID"]. "</td>"; 
					echo "<td>" . $row["病人名字"]. "</td>" ;
					echo "<td>" . $row["年紀"]. "</td>";
					echo "<td>" . $row["身高"]. "</td>";
					echo "<td>" . $row["體重"]. "</td>";
					echo "<td>" . $row["醫師ID"]. "</td>";
					echo "<td>" . $row["處方簽ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Delete")
		{
			$sql = "SELECT * FROM 病人";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				while($row = $res->fetch_assoc()) {
					echo "病人ID: " . $row["病人ID"]. "|| 病人名字: " . $row["病人名字"]. "|| 年紀: " . $row["年紀"]. "|| 身高: " . $row["身高"]. "	|| 體重: " . $row["體重"]. "|| 醫師ID: " . $row["醫師ID"].  "|| 處方簽ID: " . $row["處方簽ID"]."<br>";
				}
			} else {
				echo "查無結果";
			}
			echo '<form action="#" method ="post">
			<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
				要刪掉的病人id為 : <input type ="text" name = "刪除ID"><br>
				<input type="submit" name="ok" value="ok">
			</form>';
		}

		if($ff=="Insert")
    	{
    		echo '<form action="#" method ="post">
    		<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
    		病人ID : <input type ="text" name = "病人ID"> <br>
    		病人名字 : <input type ="text" name = "病人名字"> <br>
    		年紀 : <input type ="text" name = "年紀"> <br>
    		身高 : <input type ="text" name = "身高"> <br>
    		體重 : <input type ="text" name = "體重"> <br>
    		醫生ID : <input type ="text" name = "醫師ID"> <br>
    		處方簽ID : <input type ="text" name = "處方簽ID"> <br>
    		<br>
    		<input type="submit" name="enter" value="enter">
    		</form>';
    	}


    	if($ff=="Update")
		{
			$sql = "SELECT * FROM 病人";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				while($row = $res->fetch_assoc()) {
					echo "病人ID: " . $row["病人ID"]. "|| 病人名字: " . $row["病人名字"]. "|| 年紀: " . $row["年紀"]. "|| 身高: " . $row["身高"]. "	|| 體重: " . $row["體重"]. "|| 醫師ID: " . $row["醫師ID"].  "|| 處方簽ID: " . $row["處方簽ID"]."<br>";
				}
			} else {
				echo "查無結果";
			}
			echo '<form action="#" method ="post">
			<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
				欲Update之病人ID : <input type ="text" name = "upro"> <br>
				選擇欲更改之Attribute
				<select name="updt">
				<option value="病人ID"> 病人ID </option>
    			<option value="病人名字"> 病人名字 </option>
    			<option value="年紀"> 年紀 </option>
    			<option value="身高"> 身高 </option>
    			<option value="體重"> 體重 </option>
				<option value="醫師ID"> 醫師ID </option>
				<option value="處方簽ID"> 處方簽ID </option>
				</select>
				新的值: <input type="text" name="newval"><br>
				<input type="submit" name="change" value="Update">
			</form>';	
			
		}


		if($ff=="In")
		{
			$sql = "SELECT * FROM 醫生 WHERE 醫生ID IN (1,5,3,9,7)";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>醫生ID</th>
				<th>醫生名字</th>
				<th>所屬科別</th>
				<th>薪資</th>
				<th>醫院ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["醫生ID"]. "</td>"; 
					echo "<td>" . $row["醫生名字"]. "</td>" ;
					echo "<td>" . $row["所屬科別"]. "</td>";
					echo "<td>" . $row["薪資"]. "</td>";
					echo "<td>" . $row["醫院ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
		}


		if($ff=="Not In")
		{
			$sql = "SELECT * FROM 醫院 WHERE 地點 NOT IN ('台北','台中','台南')";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>醫院ID</th>
				<th>科別數量</th>
				<th>地點</th>
				<th>醫院簡稱</th>
				<th>創立基金會ID</th>
				<th>管理基金會ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["醫院ID"]. "</td>"; 
					echo "<td>" . $row["科別數量"]. "</td>" ;
					echo "<td>" . $row["地點"]. "</td>";
					echo "<td>" . $row["醫院簡稱"]. "</td>";
					echo "<td>" . $row["創立基金會ID"]. "</td>";
					echo "<td>" . $row["管理基金會ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		
		if($ff=="Exists")
		{
			$sql = "SELECT * FROM 病人 WHERE EXISTS(SELECT * FROM 處方簽 WHERE 處方簽.處方簽ID=病人.處方簽ID AND 處方價格>500 AND 處方價格<2000)";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>病人ID</th>
				<th>病人名字</th>
				<th>年紀</th>
				<th>身高</th>
				<th>體重</th>
				<th>醫師ID</th>
				<th>處方簽ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["病人ID"]. "</td>"; 
					echo "<td>" . $row["病人名字"]. "</td>" ;
					echo "<td>" . $row["年紀"]. "</td>";
					echo "<td>" . $row["身高"]. "</td>";
					echo "<td>" . $row["體重"]. "</td>";
					echo "<td>" . $row["醫師ID"]. "</td>";
					echo "<td>" . $row["處方簽ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Not Exists")
		{
			$sql = "SELECT * FROM 醫院 WHERE NOT EXISTS(SELECT * FROM 基金會 WHERE 醫院.創立基金會ID=基金會.基金會ID AND (資產=250000000 OR 資產=310000000 OR 基金會簡稱='OTI'))";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>醫院ID</th>
				<th>科別數量</th>
				<th>地點</th>
				<th>醫院簡稱</th>
				<th>創立基金會ID</th>
				<th>管理基金會ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["醫院ID"]. "</td>"; 
					echo "<td>" . $row["科別數量"]. "</td>" ;
					echo "<td>" . $row["地點"]. "</td>";
					echo "<td>" . $row["醫院簡稱"]. "</td>";
					echo "<td>" . $row["創立基金會ID"]. "</td>";
					echo "<td>" . $row["管理基金會ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Count")
		{
			$sql = "SELECT COUNT(病人ID) FROM 病人";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>COUNT(病人ID)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Sum")
		{
			$sql = "SELECT SUM(薪資) FROM 醫生 WHERE 薪資>300000";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>SUM(薪資>300000)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Max")
		{
			$sql = "SELECT MAX(資產) FROM 基金會";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>MAX(資產)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Min")
		{
			$sql = "SELECT MIN(處方價格) FROM 處方簽";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>MIN(處方價格)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Avg")
		{
			$sql = "SELECT AVG(薪資) FROM 醫生";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>AVG(薪資)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
		}

		if($ff=="Having")
		{
			$sql = "SELECT COUNT(醫院ID),地點 FROM 醫院 GROUP BY(地點) HAVING COUNT(醫院ID)>2";
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>COUNT(醫院ID)</th>
				<th>地點</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["COUNT(醫院ID)"]. "</td>"; 
					echo "<td>" . $row["地點"]. "</td>" ;
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
		}
	}

	if(isset($_POST['textarea'])){
    	$sql = $_POST['txtarea'];
    	$res = $conn->query($sql);


    	if(stripos($sql, 'SELECT') !== FALSE AND stripos($sql, 'WHERE') !== FALSE AND stripos($sql, 'IN') === FALSE AND stripos($sql, 'EXISTS') === FALSE AND stripos($sql, 'SUM') === FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>病人ID</th>
				<th>病人名字</th>
				<th>年紀</th>
				<th>身高</th>
				<th>體重</th>
				<th>醫師ID</th>
				<th>處方簽ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["病人ID"]. "</td>"; 
					echo "<td>" . $row["病人名字"]. "</td>" ;
					echo "<td>" . $row["年紀"]. "</td>";
					echo "<td>" . $row["身高"]. "</td>";
					echo "<td>" . $row["體重"]. "</td>";
					echo "<td>" . $row["醫師ID"]. "</td>";
					echo "<td>" . $row["處方簽ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'DELETE') !== FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "SQL上看結果 <br>";
    	}

    	else if(stripos($sql, 'INSERT') !== FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "SQL上看結果 <br>";
    	}

    	else if(stripos($sql, 'UPDATE') !== FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "SQL上看結果 <br>";
    	}

    	else if(stripos($sql, 'IN') !== FALSE AND stripos($sql, 'NOT') === FALSE AND stripos($sql, 'MIN') === FALSE AND stripos($sql, 'HAVING') === FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>醫生ID</th>
				<th>醫生名字</th>
				<th>所屬科別</th>
				<th>薪資</th>
				<th>醫院ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["醫生ID"]. "</td>"; 
					echo "<td>" . $row["醫生名字"]. "</td>" ;
					echo "<td>" . $row["所屬科別"]. "</td>";
					echo "<td>" . $row["薪資"]. "</td>";
					echo "<td>" . $row["醫院ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'IN') !== FALSE AND stripos($sql, 'NOT') !== FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>醫院ID</th>
				<th>科別數量</th>
				<th>地點</th>
				<th>醫院簡稱</th>
				<th>創立基金會ID</th>
				<th>管理基金會ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["醫院ID"]. "</td>"; 
					echo "<td>" . $row["科別數量"]. "</td>" ;
					echo "<td>" . $row["地點"]. "</td>";
					echo "<td>" . $row["醫院簡稱"]. "</td>";
					echo "<td>" . $row["創立基金會ID"]. "</td>";
					echo "<td>" . $row["管理基金會ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
    	}


    	else if(stripos($sql, 'EXISTS') !== FALSE AND stripos($sql, 'NOT') === FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>病人ID</th>
				<th>病人名字</th>
				<th>年紀</th>
				<th>身高</th>
				<th>體重</th>
				<th>醫師ID</th>
				<th>處方簽ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["病人ID"]. "</td>"; 
					echo "<td>" . $row["病人名字"]. "</td>" ;
					echo "<td>" . $row["年紀"]. "</td>";
					echo "<td>" . $row["身高"]. "</td>";
					echo "<td>" . $row["體重"]. "</td>";
					echo "<td>" . $row["醫師ID"]. "</td>";
					echo "<td>" . $row["處方簽ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'EXISTS') !== FALSE AND stripos($sql, 'NOT') !== FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>醫院ID</th>
				<th>科別數量</th>
				<th>地點</th>
				<th>醫院簡稱</th>
				<th>創立基金會ID</th>
				<th>管理基金會ID</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["醫院ID"]. "</td>"; 
					echo "<td>" . $row["科別數量"]. "</td>" ;
					echo "<td>" . $row["地點"]. "</td>";
					echo "<td>" . $row["醫院簡稱"]. "</td>";
					echo "<td>" . $row["創立基金會ID"]. "</td>";
					echo "<td>" . $row["管理基金會ID"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'COUNT') !== FALSE AND stripos($sql, 'HAVING') === FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>COUNT(病人ID)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'SUM') !== FALSE){
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>SUM(薪資>300000)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'MAX') !== FALSE){
    		echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>MAX(資產)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'MIN') !== FALSE){
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>MIN(處方價格)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'AVG') !== FALSE){
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
			$data=$res->fetch_row()[0];
			echo "<table border='2'>
				<tr>
				<th>AVG(薪資)</th>
				</tr>";
				echo "<tr>";
				echo "<td>" . $data. "</td>"; 
				echo "</tr>";
			echo "</table>";
			} else {
				echo "查無結果";
			}
    	}

    	else if(stripos($sql, 'HAVING') !== FALSE){
			echo "SQL指令為:  $sql <br>";
			echo "結果: <br>";
			$res = $conn->query($sql);
			if ($res->num_rows > 0) {
				echo "<table border='2'>
				<tr>
				<th>COUNT(醫院ID)</th>
				<th>地點</th>
				</tr>";
				while($row = $res->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["COUNT(醫院ID)"]. "</td>"; 
					echo "<td>" . $row["地點"]. "</td>" ;
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "查無結果";
			}
    	}


    	else {
			echo "查無結果";
		}
    }

    if(isset($_POST['ok']))
	{
		$delid = $_POST['刪除ID'];
		$sql = "DELETE FROM 病人 WHERE 病人ID=".$delid."";
		if ($conn->query($sql) === TRUE) {
    		echo "成功刪除病人資料";
		} else {
    		echo "刪除失敗 " . $sql . "<br>" . $conn->error;
		}
	}

    if(isset($_POST['change'])){
		$updt= $_POST['updt'];
		$newval= $_POST['newval'];
		$upro= $_POST['upro'];
		$sql = "UPDATE 病人 SET ".$updt."='".$newval."' WHERE 病人ID=".$upro."";
			if ($conn->query($sql) === TRUE) {
				echo "成功更改資料";
			} else {
				echo "更改資料錯誤" . $conn->error;
			}
	}		
    if(isset($_POST['enter'])){
    	
    	$sql = "INSERT INTO 病人 (病人ID, 病人名字, 年紀, 身高, 體重, 醫師ID, 處方簽ID)
				VALUES ('".$_POST['病人ID']."', '".$_POST['病人名字']."', '".$_POST['年紀']."', '".$_POST['身高']."', '".$_POST['體重']."', 
				'".$_POST['醫師ID']."', '".$_POST['處方簽ID']."')";
		if ($conn->query($sql) === TRUE) {
    		echo "INSERT成功";
		} else {
    		echo "INSERT失敗: " . $sql . "<br>" . $conn->error;
		}	
	}
	
    $conn->close();
?>