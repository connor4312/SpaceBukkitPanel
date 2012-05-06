<style>
  .darkwell .f-row {
    cursor: pointer;
  }
  .f-row.selected .f-btns {
  	display: inline !important;
  	opacity: 1 !important;
  	-moz-opacity: 1 !important;
  	filter:alpha(opacity=1) !important;
  }
  .darkwell .f-filename {
    font-size: 15px;
    line-height: 25px;
    font-weight: normal;
    color: #aaa;
    display: inline;
  }
  .darkwell .f-mime {
    font-size: 12px;
    line-height: 25px;
    font-weight: normal;
    color: #676767;
    display: inline;
    margin-right: 15px;
  }
  .darkwell .f-btns {
    font-size: 15px;
    line-height: 25px;
    font-weight: normal;
    color: #aaa;
    display: none;
    float: right;
  }
  .darkwell .f-row:hover .f-btns {
  	display: inline-block;
  }
  .darkwell h2 {
    text-align: center;
    position: relative;
    margin: 100px 0;
    top: -50px;
  }
  .darkwell h3 {
    text-align: center;
    position: relative;
    margin: 20px 0;
  }

  #list{
  	max-height: 600px;
  	overflow-x: hidden;
  	overflow-y: auto;
  }

  #config {
  	display: none;
  }

  .f-tree {
  	margin-top: 47px;
  }

</style>

<!-- Content -->
<section id="content"> 

	<a href="#" id="test">Test</a>

	<section class="b-home">

	  <div class="col col_1_3 left">

	  	<div>

		  	<section class="f-tree">

			    <div class="darkwell" id="tree">

			      <section class="f-row">
			      		Tree......
			      </section>
			    </div>

	        </section>

	    </div>

	  </div>

	  <div class="col col_2_3 right">

	  	<div id="top_btns" class="pull-right">

	        <span class="button-group">
	            <a class="button icon log" href="#">New File</a>
	            <a class="button icon move" href="#">New Folder</a>
	            <a class="button icon edit" href="#">Upload File</a>
	        </span>

	  	</div>

	  	<div class="clear"></div>

	    <div class="darkwell" id="list">

	      <section class="f-row">
	      		Loading...
	      </section>
	    </div>

	  </div>

	  <div class="clear"></div>

	</section>

</section>

<!-- End #content --> 
<script>

$('document').ready(function() {

	var f_buttons		 = $('.f-btns');
	var f_row			 = $('.f-row');
	var f_i 			 = $('.f-info');
	var list			 = $('#list');
	var config			 = $('#config');

	//hover effects for file row

	f_row.live({
        mouseenter:
           function()
           {
			$(this).children('.f-btns').stop().animate({'opacity' : '1'});
           },
        mouseleave:
           function()
           {
			$(this).children('.f-btns').stop().animate({'opacity' : '0'});
           }
	});

	//select a row

	f_row.live('click', function() {

		if ($(this).hasClass('selected')) 
		{
			$(this).removeClass('selected');
			f_i.fadeOut();
			//remove fileinfo
		}
		else 
		{

			$('section.selected').removeClass('selected');

			$(this).addClass('selected');

		}

	});

	//function that loads a directory view

	function loadDir(path) {

		var url = './tfiles/loadDir/'+path;

		list.html('<h2>Fetching directory...</h2>').activity().load(url);

	}

	// "explore" click event 

	$('.explore').live('click', function() {

		var path = $(this).attr('href');

		loadDir(path);

		return false;

	});

	$('#test').click(function() {

		loadDir('.@@');

	});

	loadDir('.@@');

});

</script>

<script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.jstree.js"></script>