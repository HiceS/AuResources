<div id="login-wrapper" class="wrapper">
	<form id="log-form" action="index.php?page=insert" method="post">
		<ul>
			<li>
				<a for="error" name="error"></a>
			</li>
			<li>
				<label for="username">Username:</label>
				<input type="varchar" name="username"/>
			</li>
			<li>
				<label for="email">Email:</label>
				<input type="varchar" name="email"/>
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
				<label for="sint">Secret and Lucky Number:</label>
				<input type="input" name="sint">
			</li>
			<li class="buttons">
				<input type="submit" href="index.php?page=insert" name="register" value="Register" />
			</li>
		</ul>
	</form>
</div>