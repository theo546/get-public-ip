<?php

$ip_address = $_SERVER['REMOTE_ADDR'];
$protocol_to_try = '4';
$current_protocol = '6';
if(filter_var($ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
	$protocol_to_try = '6';
	$current_protocol = '4';
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Get-IP</title>
	</head>
	<body>
		<div id="ipv4">IPv4 address: <span id="ipv4_address">Fetching...</span></div>
		<div id="ipv6">IPv6 address: <span id="ipv6_address">Fetching...</span></div>
		<div>
			<a href="//ipv4.your-domain.tld">Force IPv4</a>
		</div>
		<div>
			<a href="//ipv6.your-domain.tld">Force IPv6</a>
		</div>
		<script>
			window.onload = function() {
				document.getElementById("ipv<?php echo $current_protocol; ?>_address").innerHTML = "<?php echo $ip_address; ?>";

				var xhttp = new XMLHttpRequest();
				var protocol_to_try = <?php echo $protocol_to_try; ?>;
				xhttp.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200) {
						document.getElementById("ipv" + protocol_to_try + "_address").innerHTML = this.responseText;
					}
					else if(this.readyState == 4 && this.status != 200) {
						document.getElementById("ipv" + protocol_to_try + "_address").innerHTML = "No IPv" + protocol_to_try + " detected.";
					}
				};
				xhttp.open("GET", "//ipv" + protocol_to_try + ".your-domain.tld", true);
				xhttp.send();
			}
		</script>
	</body>
</html>