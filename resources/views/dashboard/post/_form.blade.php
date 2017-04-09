  {{ csrf_field() }}
	<div class="row">
		<div class="input-field col s6">
			<input id="title" type="text" name="title" class="validate materialize-textarea">
			<label for="title">Title</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12">
			<textarea id="textarea" name="content" class="materialize-textarea"></textarea>
			<label for="textarea">Content</label>
		</div>
	</div>
	<p>
		<input type="checkbox" class="filled-in" id="filled-in-box"  name="status" />
		<label for="filled-in-box">Publish</label>
	</p>
