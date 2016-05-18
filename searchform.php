<form role="search" method="get" id="searchform" class="searchform table" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="table-cell"><input placeholder="Search Address, City, Zip Code, or Area..." type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" onclick="this.value='';" autofocus="autofocus" onfocus="this.select()"/></div>
	<div class="table-cell right"><button>Search</button></div>
</form>