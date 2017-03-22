<script type="text/x-template" id="item-row">

	<tr>
		<td>${route}</td>
		<td>${km} Km</td>
		<td>${factor}</td>
		<td>Bs. ${night}</td>
		<td>Bs. ${holiday}</td>
		<td><b>Bs. ${subtotal}</b></td>
		<td class="text-center">
			<button data-color='lightblue' data-table="items" class='btn btn-icon btn-default' 	data-form='form-delete-items' data-row-id='${id}' onclick='$.deleteItem(event, $(this))'><span class='fa fa-trash'></span></button>
		</td>
	</tr>

</script>