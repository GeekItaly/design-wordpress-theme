<div class="grid sortable">
	<div class="row sortable">
		<div class="actions">
			<div class="rowhandle">H</div>
			<div class="options">O</div>
		</div>
		<section>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>1</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>2</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>3</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>4</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>5</div>
			</div>
		</div>
		</section>
	</div>
	<div class="row sortable">
		
		<div class="actions">
			<div class="rowhandle">H</div>
			<div class="options">O</div>
		</div>
		<section>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>1</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>2</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>3</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>4</div>
			</div>
		</div>
		<div class="col">
			<div class="actions">
				<div class="handle">H</div>
				<div class="options">O</div>
			</div>
			<div class="content">
				<div>5</div>
			</div>
		</div>
		</section>
	</div>
</div>

<style>
.grid {
	padding: 10px;
	padding-top: 1px;
	background: gray;
}
.grid .actions {
	margin: 0 0 4px;
	background: orange;
}
.grid .actions > div {
	display: inline-block;
	vertical-align: top;
}
.row {
	margin-top: 10px;
	background: darkgray;
}
.col {
	display: inline-block;
	vertical-align: top;
	padding: 2px;
	width: 50px;
	background: #e7ee82;
}
.content {
	background: gainsboro;
}

.ui-sortable-placeholder {
    visibility: visible !important;
    background: red;
}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$('.grid').sortable({
	handle: '.rowhandle'
	//,tolerance: 'pointer'
	,helper: 'clone'
    //,placeholder: 'col-xs-4'
    //,distance: 1 // mouse minimum px before start drag
    ,items: '> .row'
});
$('section').sortable({
	handle: '.handle'
	//,tolerance: 'pointer'
	,helper: 'clone'
    //,placeholder: 'col-xs-4'
    //,distance: 1 // mouse minimum px before start drag
    ,connectWith: 'section'
});
//$( ".sortable" ).disableSelection();
</script>