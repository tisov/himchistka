<script type="text/template" id="happyforms-form-parts-drawer-template">
	<div id="happyforms-parts-drawer">
		<div class="happyforms-parts-drawer-header">
			<div class="happyforms-parts-drawer-header-search">
				<input type="text" placeholder="<?php _e( 'Search parts', 'happyforms' ); ?>&hellip;" id="part-search">
				<div class="happyforms-parts-drawer-header-search-icon"></div>
				<button type="button" class="happyforms-clear-search"><span class="screen-reader-text"><?php _e( 'Clear Results', 'happyforms' ); ?></span></button>
			</div>
		</div>
		<ul class="happyforms-parts-list">
			<% for (var p = 0; p < parts.length; p ++) { var part = parts[p]; %>
			<li class="happyforms-parts-list-item" data-part-type="<%= part.type %>">
				<div class="happyforms-parts-list-item-content">
					<div class="happyforms-parts-list-item-title">
						<h3><%= part.label %></h3>
					</div>
					<div class="happyforms-parts-list-item-description"><%= part.description %></div>
				</div>
			</li>
			<% } %>
		</ul>
		<div class="happyforms-parts-drawer-not-found">
			<p><?php _e( 'No parts found.', 'happyforms' ); ?></p>
		</div>
	</div>
</script>