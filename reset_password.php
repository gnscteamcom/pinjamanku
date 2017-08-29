<?php 
	include "admin/config/database.php";

	/*print_r($_GET);
	die();*/
	$act = $_GET['act'];
	$email = $_POST['email'];

	$SQL = "SELECT * FROM anggota WHERE email = '".$email."'";
	$data=mysqli_fetch_assoc(mysqli_query($con,$SQL));
	$cekRows = count($data);

	if ($act == 'proses1') {
		$text = '<div style="margin:0;padding:0;font-family:sans-serif" bgcolor="#F7F7F7">
			        <table cellspacing="0" cellpadding="0" border="0" width="100%">
			            <tbody><tr>
			                <td>
			                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px 0">
			                        <tbody><tr>
			                            <td></td>
			                        </tr>
			                    </tbody></table>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    <table cellspacing="0" cellpadding="0" border="0" width="600" align="center" style="border-collapse:collapse;background-color:#ffffff">
			                        <tbody><tr>
			                            <td style="padding:15px 20px 10px" bgcolor="#142C7A">
			                                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse;color:#ffffff">
			                                    <tbody><tr>
			                                          <a href="localhost/pinjamanku" style="display:inline-block;padding:20px 30px;background-color:#142C7A;color:#ffffff;text-decoration:none;font-size:15px;font-weight:bold;border-radius:3px;width:210px" target="_blank" data-saferedirecturl="">Pinjamanku
			                                			</a>
			                                        </td>
			                                    </tr>
			                                </tbody></table>
			                            </td>
			                        </tr>
			                        <tr>
			                            <td style="font-size:20px;padding:30px 20px 20px;font-weight:bold;color:#4e4e4e">Petunjuk Ubah Kata Sandi</td>
			                        </tr>
			                        <tr>
			                            <td style="padding:30px 20px">
			                                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse;font-size:15px">
			                                    <tbody><tr>
			                                        <td style="line-height:25px;color:#4f4f4f">
			                                        <span style="font-size:1.4em">Hi, '.$data['nm_depan']." ".$data['nm_blkg'].'!</span>
			                                        <br>
			                                        <br>
			                                        Klik tombol di bawah ini untuk mengubah kata sandi akun Pinjamanku:</td>
			                                    </tr>
			                                </tbody></table>
			                            </td>
			                        </tr>
			                        <tr>
			                            <td style="padding:10px 20px" align="center">
			                                <a href="localhost/pinjamanku/lupa_pass.php?act=confirmLupaPass&email='.$email.'" style="display:inline-block;padding:20px 30px;background-color:#142C7A;color:#ffffff;text-decoration:none;font-size:15px;font-weight:bold;border-radius:3px;width:210px" target="_blank" data-saferedirecturl="">Ubah Kata Sandi
			                                </a>
			                            </td>
			                        </tr>
			                        <tr>
			                            <td>
			                                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse">
			                                    <tbody><tr>
			                                        <td width="300" height="10"></td>
			                                        <td width="300" height="10"></td>
			                                    </tr>
			                                </tbody></table>
			                            </td>
			                        </tr>
			                    </tbody>
			                 </table>
			                    
			                </td>
			            </tr>
			        </tbody></table>
			<p>&nbsp;<br></p>
			</div>';
		
		if ($cekRows > 0) {
			$error = "<p style=\"margin-left:8px; color:green;\">SilahKan Cek Email Anda</p>";
			sendMailResetPassword($email,$text);
		}else{
			$error = "<p style=\"margin-left:8px; color:#FE0101;\">Email Tidak Ditemukan</p>";
		}

		echo $error;
		//sendMailResetPassword($email,$text);
	}else{
		$newPass = $_POST['newPass'];
		$repeatnewpassword = md5($_POST['newPass']);
		$confirmPass = md5($_POST['confirmPass']);

		$text = '<div style="margin:0;padding:0;font-family:sans-serif" bgcolor="#F7F7F7">
			        <table cellspacing="0" cellpadding="0" border="0" width="100%">
			            <tbody><tr>
			                <td>
			                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px 0">
			                        <tbody><tr>
			                            <td></td>
			                        </tr>
			                    </tbody></table>
			                </td>
			            </tr>
			            <tr>
			                <td>
			                    <table cellspacing="0" cellpadding="0" border="0" width="600" align="center" style="border-collapse:collapse;background-color:#ffffff">
			                        <tbody><tr>
			                            <td style="padding:15px 20px 10px" bgcolor="#142C7A">
			                                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse;color:#ffffff">
			                                    <tbody><tr>
			                                          <a href="" style="display:inline-block;padding:20px 30px;background-color:#142C7A;color:#ffffff;text-decoration:none;font-size:15px;font-weight:bold;border-radius:3px;width:210px" target="_blank" data-saferedirecturl="">Pinjamanku
			                                			</a>
			                                        </td>
			                                    </tr>
			                                </tbody></table>
			                            </td>
			                        </tr>
			                        <tr>
			                            <td style="font-size:20px;padding:30px 20px 20px;font-weight:bold;color:#4e4e4e">Kata Sandi Berhasil di Rubah</td>
			                        </tr>
			                        <tr>
			                            <td style="padding:30px 20px">
			                                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse;font-size:15px">
			                                    <tbody><tr>
			                                        <td style="line-height:25px;color:#4f4f4f">
			                                        <span style="font-size:1.4em">Hi, Muhammad Nuridin!</span>
			                                        <Br><br>
			                                        <div style="font-size:1em">
			                                        	User Login: '.$email.'
			                                        </div>
			                                        <div style="font-size:1em">
			                                        	User Pass: '.$newPass.'
			                                        </div>
			                                        <br>
			                                        Klik tombol di bawah ini untuk login ke aplikasi Pinjamanku:</td>
			                                    </tr>
			                                </tbody></table>
			                            </td>
			                        </tr>
			                        <tr>
			                            <td style="padding:10px 20px" align="center">
			                                <a href="localhost/pinjamanku/login.php" style="display:inline-block;padding:20px 30px;background-color:#142C7A;color:#ffffff;text-decoration:none;font-size:15px;font-weight:bold;border-radius:3px;width:210px" target="_blank" data-saferedirecturl="">Masuk
			                                </a>
			                            </td>
			                        </tr>
			                        <tr>
			                            <td>
			                                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse">
			                                    <tbody><tr>
			                                        <td width="300" height="10"></td>
			                                        <td width="300" height="10"></td>
			                                    </tr>
			                                </tbody></table>
			                            </td>
			                        </tr>
			                    </tbody>
			                 </table>
			                    
			                </td>
			            </tr>
			        </tbody></table>
			<p>&nbsp;<br></p>
			</div>';

		/*$SQL = "SELECT * FROM anggota WHERE email = '".$email."'";
		$data=mysqli_fetch_assoc(mysqli_query($con,$SQL));
		$cekRows = count($data);*/

		if ($cekRows > 0) {
			if ($repeatnewpassword == $confirmPass) {
				mysqli_query($con,"UPDATE anggota SET pass ='".$repeatnewpassword."' WHERE email= '".$email."' ");
				$error = "<p style=\"margin-left:8px; color:green;\">Password Berhasil di rubah. Silahkan Cek Email Anda</p>";
				sendMailResetPassword($email,$text);
			}else{
				$error = "<p style=\"margin-left:8px; color:#FE0101;\">Password tidak sesuai</p>";
			}
		}else{
			$error = "<p style=\"margin-left:8px; color:#FE0101;\">Data Tidak Ditemukan</p>";
		}

		echo $error;
	}

	function sendMailResetPassword($email,$textHtml){
		require 'plugins/class.phpmailer.php';
		//$textHtml = "";
		$mail = new PHPMailer;

		//Enable SMTP debugging. 
		$mail->SMTPDebug = 4;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();            
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                          
		//Provide username and password     
		$mail->Username = "projekdevelopment@gmail.com";                 
		$mail->Password = "d3veL0pm3nt";                           
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to 
		$mail->Port = 587;                                   

		$mail->From = "hpwhanna@gmail.com";
		$mail->FromName = "Pinjamanku";

		$mail->addAddress($email, "Pinjamanku");

		$mail->isHTML(true);

		$mail->Subject = "Atur Ulang Kata Sandi Pinjamanku";
		$mail->Body = html_entity_decode($textHtml);//"<i>Mail body in HTML</i>";
		$mail->AltBody = "This is the plain text version of the email content";

		if(!$mail->send()) 
		{
		    //echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else 
		{
			/*echo "<script>
					alert('Silahkan Cek Email');
				</script>";*/
		    //echo "Message has been sent successfully";
		}
	}
?>