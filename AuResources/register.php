<div id="register-wrapper">
	<form action="index.php?page=insert" method="post">
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="varchar" name="username"/>
			</li>
			<li>
				<label for="name">First and last name:</label>
				<input type="varchar" name="name"/>
			</li>
			<li>
				<label for="password">Password:</label>
				<input type="password" name="password" />
			</li>
			<li>
				<label for="conpassword">Confirm Password:</label>
				<input type="password" name="conpassword">
			</li>
		    <li>
			    <label for="subteam_number">Subteam: </label>
				<form action="">
				<select name="subteam_number">
					<option value="1">Carlo</option>
					<option value="2">Mentor</option>
					<option value="3">Griffen</option>
					<option value="4">Programming</option>
					<option value="5">Build Team</option>
					<option value="6">Business Team</option>
					<option value="7">Design Team</option>
				</select>
				</form>
			</li>
			<li>
				<label for="years">Years of service: </label>
				<input type="is_int" name="years">
			</li>
			<li class="buttons">
				<input type="submit" href="index.php?page=insert" name="register" value="Register" />
			</li>
		</ul>
	</form>
</div>