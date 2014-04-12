<?php
	require_once("conf.php");
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>

<title>Raleigh Nights</title>
	<?php require_once("welcome-login.php"); ?>
</head>
<body>
	<?php if ( $_SESSION['user_type'] != 1 ) {
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
    require_once("navigation.php"); ?>
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Edit Events</div>
            <?php
			$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$query = "SELECT uf.firm_id, uf.email, u.first_name, u.last_name, u.user_type, f.name, f.phone, uf.sent_confirmation, uf.confirmation_code, ut.description ";
			$query .= "FROM user_firms uf, firm f, users u, user_type ut WHERE uf.verified = 0 AND uf.email = u.email AND uf.firm_id = f.firm_id AND u.user_type = ut.user_type";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This page allows administrators to call verify that a user is associated with an account</p><br />
          
          
        <form action="verify-individual-process.php" method="post" id="delete">
        	<fieldset>
            	<br />
                <?php
					$email = "";
					$first = true;
					while ( $row = $result->fetch_assoc() ) {
						if ( $email != Common::checkString($row['email']) ) {
							if ( $first ) {
								$first = false;
							} else {
								echo "</table>";
								echo "<br />";
							}
							$email = Common::checkString($row['email']);
							$first_name = Common::checkString($row['first_name']);
							$last_name = Common::checkString($row['last_name']);
							
							?>
                            <verifylegend>Verify: <?php echo $email.', '.$first_name.' '.$last_name.' - '.$row['description'];?></verifylegend><br />
                            <table>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Business Phone</th>
                                    <th>Conf Code</th>
                                    <th>Conf Sent</th>
                                </tr>
                             
                        <?php 
						}
						echo "<tr>";
						echo "<td>".Common::checkString($row['name'])."</td>";
						echo "<td>".Common::checkString($row['phone'])."</td>";
						echo "<td>".Common::checkString($row['confirmation_code'])."</td>";
						if ( $row['sent_confirmation'] == 0 ) {
							echo "<td><input type='checkbox' name='sent[]' value=".$email.'-'.$row['firm_id']."> Called</input></td>";
						} else {
							echo "<td>Already Sent</td>";
						}
						echo "</tr>";
					}
					mysqli_close($conn);
				?>
            </table> 
			</fieldset>
			<div class="buttons">
				<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
			</div>
         </form>
         <br />
        </div>
	</div>
        <?php require_once("footer.php"); ?>


