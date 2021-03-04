<?php include("main_header.php"); ?>

<script type="text/javascript">
	function intoarceMain(){
			location.href="main.php";
			return true;
		}
</script>

<h1>Adaugare client nou </h1>
<form id="adaugare_client" name="adaugare_client" action="client_insert.php" method="post">
	<table id="adaugare_client">
		<tr>
			<td align="right">
				<label for="Nume"> Nume: </label>
			</td>
			<td align="left">
				<input type="text" id="Nume" name="Nume" size="30" maxlength="50" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="Prenume"> Prenume: </label>
			</td>
			<td align="left">
				<input type="text" id="Prenume" name="Prenume" size="30" maxlength="50" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="Telefon"> Telefon: </label>
			</td>
			<td align="left">
				<input type="text" id="Telefon" name="Telefon" size="15" maxlength="10" />
			</td>	
		</tr>
		<tr>
			<td align="right">
				<label for="Mail"> Mail: </label>
			</td>
			<td align="left">
				<input type="text" id="Mail" name="Mail" size="30" maxlength="50" />
			</td>	
		</tr>
		<tr>
			<td valign="top" align="center">
				<br />
				<input type="submit" class="button" name="adaugaClient" id="adaugaClient" value="Adauga Client" />
			</td>
			<td valign="top" align="center">
				<br />
				<input type="button" name="back" value="Inapoi la main" onclick="intoarceMain()" />
			</td>
		</tr>
	</table>
</form>

<?php include("main_footer.php"); ?>