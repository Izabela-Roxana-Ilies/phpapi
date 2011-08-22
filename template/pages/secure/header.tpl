<div id="profile_picture_hint" fb_id=""></div>
<div class='userSquare'>
		<table>
			<tr>
				<td>
					<img src='http://graph.facebook.com/{$user_profile.id}/picture' />
				</td>
				<td>
					<table>
						<tr>
							<td>
								{$user_profile.name}
							</td>
						</tr>
						<tr>
							<td>
								<a href='/API/user/logout'>Logout</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					&nbsp;
				</td>
			</tr>
		</table>
</div>