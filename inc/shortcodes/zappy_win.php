<?php
$action = htmlentities($_GET['action']);
?>
<!DOCTYPE html>
<head>
	<link rel='stylesheet' type='text/css' href="zappy_shortcodes.css" media='all' />
	<script type="text/javascript" src="../../../../../wp-includes/js/jquery/jquery.js"></script>
	<script type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style tyle="text/css">
.size
{
width:195px;
height:20px;
}
</style>
<!-- Box shortcodes
============================================================================================================ -->

<?php
if( $action == 'box' ){
?>
	<script type="text/javascript">
	function init() {
    tinyMCEPopup.resizeToInnerSize();
}
function createpostShortcode() {
  		var Title = jQuery('#Title').val();var bxtype=jQuery("#bxtype").val();var bxalign=jQuery("#bxalign").val();var bxcontent=jQuery("#bxcontent").val();var output="[box ";if(Title) {output += 'title="'+Title+'" ';}if(bxtype){output+='type="'+bxtype+'" '}if(bxalign){output+='align="'+bxalign+'" '}output+="]"+bxcontent+"[/box]"
    	tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		tinyMCEPopup.close();
   
    return;
}

</script>

	<title>Add Box</title>
</head>

<body>
<form id="postShortcode">
	  <table border="0" cellpadding="4" cellspacing="0">
	        <tr>
	            <td>Insert New shortcode</td>	        
			</tr>
			
		<tr>
			<td><label for="Title">Title</label></td>
			<td><input id="Title" name="Title" type="text" value="" class="size"/></td>

		</tr>
			<tr>	
				<td><label for="bxtype">Type of the box :</label></td>
				<td><select id="bxtype" name="bxtype">
					<option value="sbox">Sucess</option>
					<option value="ebox">Error</option>
					<option value="abox">Alert</option>
					<option value="dbox">Download</option>
					<option value="fbox">Favorite</option>
					<option value="flbox">Flag</option>			
					
				</select>
			    </td>
			</tr>
			
			<tr>
				<td><label for="bxcontent">Content : </label></td>
				<td><textarea id="bxcontent" name="bxcontent" rows="10" cols="35"></textarea></td>
			</tr>
			<tr><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</form>

<!-- Buttons shortcodes
============================================================================================================ -->

<?php
} elseif( $action == 'buttons' ){
 ?>
 	<script type="text/javascript">
		function init() {
    tinyMCEPopup.resizeToInnerSize(); }

		function createpostShortcode() {

			var btncolor=jQuery("#btncolor").val();var btnsize=jQuery("#btnsize").val();var btnlink=jQuery("#btnlink").val();var btntext=jQuery("#btntext").val();var output="[button ";if(btncolor){output+='color="'+btncolor+'" '}if(btnsize){output+='size="'+btnsize+'" '}if(btnlink){output+='link="'+btnlink+'" '}if(jQuery("#Buttontarget").is(":checked")){output+='target="blank" '}output+="]"+btntext+"[/button]";tinyMCEPopup.execCommand("mceReplaceContent",false,output);tinyMCEPopup.close()
			
			return;
		}
	
	</script>
	<title>Add Buttons</title>

</head>
<body>
<form id="postShortcode">
	<table>
		<tr>
				<td><label for="btncolor">Type of the box :</label></td>
				<td><select id="btncolor" name="btncolor">
					<option value="red">Red</option>
					<option value="yellow">Yellow</option>
					<option value="blue">Blue</option>
					<option value="green">Green</option>
					<option value="black">Black</option>
					<option value="grey">Gray</option>
					<option value="purple">Purple</option>
					<option value="gblue">Gray Blue</option>
				</select>
				</td>

	</tr>
	<tr>
		<td><label for="btnsize">Button Size :</label></td>
		<td><select id="btnsize" name="btnsize">
			<option value="small-button">Small</option>
			<option value="medium-button">Medium</option>
			<option value="large-button">Large</option>
		</select></td>
	</tr>
	<tr>
		<td><label for="btnlink">Button Link :</label></td>
		<td><input id="btnlink" name="btnlink" type="text" value="http://" class="size"/></td>
	</tr>
		
	<tr>
		<td><label for="btntext">Button Text :</label></td>
		<td><input id="btntext" name="btntext" type="text" value="" class="size"/></td>
	</tr>
<table>
	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</form>

 <!-- Icon shortcodes
============================================================================================================ -->

<?php
} elseif( $action == 'icon' ){
 ?>
 	<script type="text/javascript">
	function init() {
    tinyMCEPopup.resizeToInnerSize();
}
function createpostShortcode() {

var iconcolor=jQuery("#iconcolor").val();var icontype=jQuery("#icontype").val();var iconlink=jQuery("#iconlink").val();var icontext=jQuery("#icontext").val();var output="[icon ";if(iconcolor){output+='color="'+iconcolor+'" '}if(icontype){output+='type="'+icontype+'" '}if(iconlink){output+='link="'+iconlink+'" '}if(jQuery("#Buttontarget").is(":checked")){output+='target="blank" '}output+="]"+icontext+"[/icon]"
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();				
			return;
		}
		
	</script>
	<title>Add Icons</title>
</head>
<body>
<form id="postShortcode">
	<table>
	<tr>
		<td><label for="iconcolor">Icon Color :</label></td>
		<td><select id="iconcolor" name="iconcolor">
					<option value="red">Red</option>
					<option value="yellow">Yellow</option>
					<option value="blue">Blue</option>
					<option value="green">Green</option>
					<option value="black">Black</option>
					<option value="grey">Gray</option>
					<option value="purple">Purple</option>
					<option value="gblue">Gray Blue</option>
				</select>
				</td>
	</tr>
	<tr>
		<td><label for="icontype">Icon Type :</label></td>
		<td><select id="icontype" name="icontype">
			<option value="home-ic">Home</option>
			<option value="search-ic">Search</option>
			<option value="user-ic">User</option>
			<option value="tick-ic ">Tick</option>
			<option value="go-ic">Go</option>
			<option value="comment-ic">Comment</option>
			<option value="upload-ic">Upload</option>
			<option value="close-ic">Close</option>		
		</select></td>
	</tr>
	<tr>
		<td><label for="iconlink">Button Link :</label></td>
		<td><input id="iconlink" name="iconlink" type="text" value="http://" class="size"/></td>
	</tr>
	<tr>
		<td><label for="Buttontarget">Open Link in a new window : </label></td>
		<td><input id="Buttontarget" name="Buttontarget" type="checkbox" value="true" /></td>
	</tr>
	
	<tr>
		<td><label for="icontext">Button Text :</label></td>
		<td><input id="icontext" name="icontext" type="text" value="" class="size"/></td>
	</tr>

	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</table>
</form>

<!-- Author shortcodes
============================================================================================================ -->

<?php } elseif( $action == 'author' ){ ?>
	<script type="text/javascript">
		function init() {
    tinyMCEPopup.resizeToInnerSize(); }
	function createpostShortcode() {

			var author_name=jQuery("#author_name").val();
			var output="[author ID='"+author_name+"']";
			
			tinyMCEPopup.execCommand("mceReplaceContent",false,output);
			tinyMCEPopup.close()
				
			return;
		}		
	</script>
	<title>Author Bio</title>

</head>
<body>
<form id="postShortcode">
	<table>
		<tr>
			<td><label for="Author">Select Author</label></td>
			<td>
				<select id="author_name" name="author_name" >
					<?php
						
						$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
						get_template_part( $parse_uri[0] . 'wp-load.php' );
						
						$zappy_authors = get_users('orderby=nicename&role=administrator&who=authors');
						 foreach ($zappy_authors as $author) {
						
						   echo "<option value='$author->ID'>" . ucfirst($author->user_nicename) . "</option>";
						 }

					?>
				</select>
				
			</td>
		</tr>
		
		<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
	</table>
</form>

<?php } elseif( $action == 'quote' ){ ?>
	
	<script type="text/javascript">
		function init() {
	    tinyMCEPopup.resizeToInnerSize(); }
		function createpostShortcode() {
			var Name=jQuery("#Name").val();var Content=jQuery("#Content").val();var output="[quote ";if(Name){output+='Name="'+Name+'" '}output+="]"+Content+"[/quote]";tinyMCEPopup.execCommand("mceReplaceContent",false,output);tinyMCEPopup.close()				
			return;
		}		
	</script>
	<Name>Quote</Name>
</head>
<body>
<form id="postShortcode">
	<table>
	<tr>
		<td><label for="Name">Name</label></td>
		<td><input id="Name" name="Name" type="text" value="" class="size" /></td>	
	</tr>
	<tr>
		<td><label for="Content">Content : </label></td>
		<td><textarea id="Content" name="Content" rows="10" cols="35"></textarea></td>
	</tr>
	
	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
	</table>
</form>

<!-- Tabs shortcodes
============================================================================================================ -->

<?php } elseif( $action == 'tabs' ){ ?>

<script type="text/javascript">
		function init() {
	    tinyMCEPopup.resizeToInnerSize(); }
		function createpostShortcode() {

				var output="[tabs ";
				var Type=jQuery("#Type").val();
				if(Type){output+='type="'+Type+'"'}
				output+="][tabs_head]";
				 var i=1;
				jQuery("input[id^=tab_title]").each(function(){
				
						output+="[tab_title id='tab-"+i+"']"+jQuery(this).val()+"[/tab_title]"
						i++;
						});
				output+="[/tabs_head]";
				var j=1;
				jQuery("textarea[id^=Content]").each(function(){
					
					output+="[tab id='tab-"+j+"']"+jQuery(this).val()+"[/tab]"
					j++;
				});
				output+="[/tabs]";
				tinyMCEPopup.execCommand("mceReplaceContent",false,output);
				tinyMCEPopup.close()
				
			return;
		}
		
		jQuery(document).ready(function() {
			jQuery("#add-tab").click(function() {
				jQuery('#TabsShortcodeContent').append('<p><label for="tab_title[]">Tab Title</label><input id="tab_title[]" name="tab_title[]" type="text" value="" /></p><p><label for="Content[]">Tab Content</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p>	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />');
			});
		});
		
	</script>
	<title>Add Tabbed Content</title>
</head>
<body>
<form id="TabsShortcode">
<div id="TabsShortcodeContent">
	<table>
	<tr>
		<td><label for="Type">Type : </label></td>
		<td><select id="Type" name="Type">
			<option value="one">one</option>
			<option value="two">two</option>
		</select></td>
	</tr>
	<tr>
		<td><label for="tab_title[]">Tab Title</label></td>
		<td><input id="tab_title[]" name="tab_title[]" type="text" value="" class="size"/></td>
	</tr>
	<tr>
		<td><label for="Content[]">Tab Content</label></td>
		<td><textarea rows="10" cols="35" id="Content[]" name="Content[]" type="text" value="" ></textarea></td>
	</tr>
	
</div>
	<strong><a style="cursor: pointer;" id="add-tab">+ Add Tab</a></strong>
	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</form>


<!-- Toggle shortcodes
============================================================================================================ -->

<?php } elseif( $action == 'toggle' ){ ?>

	<script type="text/javascript">
		function init() {
			tinyMCEPopup.resizeToInnerSize();
		}
		/* function createpostShortcode() {
		var Title=jQuery("#Title").val();var state=jQuery("#state").val();var Content=jQuery("#Content").val();var output="[toggle ";if(Title){output+='title="'+Title+'" '}if(state){output+='state="'+state+'" '}output+="]"+Content+"[/toggle]";tinyMCEPopup.execCommand("mceReplaceContent",false,output);tinyMCEPopup.close()
		return;
		} */
		function init() {
	    tinyMCEPopup.resizeToInnerSize(); }
		function createpostShortcode() {

				var output="[toggles]";
				var i=1;
				jQuery("input[id^=toggle_title]").each(function(){
					var content=jQuery("#Content_"+i+"").val();
					output+="[toggle title='"+jQuery(this).val()+"']"+content+"[/toggle]"
					i++;
				});
				output+="[/toggles]";
				tinyMCEPopup.execCommand("mceReplaceContent",false,output);
				tinyMCEPopup.close()
				
			return;
		}
		
		jQuery(document).ready(function() {
		   var j=2;
			jQuery("#add-toggle").click(function() {
				jQuery('#TogglesShortcodeContent').append('<p><label for="toggle_title[]">toggle Title</label><input id="toggle_title" name="toggle_title[]" type="text" value="" /></p><p><label for="Content[]">toggle Content</label><textarea  style="height:100px;  width:200px;" id="Content_'+j+'" name="Content[]" type="text" value=""></textarea></p>	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />');
			j++;	
			});
		});
		
	</script>
	<title>Add Toggle</title>

</head>
<body>
<form id="postShortcode">
<div id="TogglesShortcodeContent">
	<table>
		<tr>
			<td><label for="Title">Title</label></td>
			<td><input id="toggle_title" name="toggle_title" type="text" value="" class="size"/></td>

		</tr>
		
		<tr>
			<td><label for="Content">Content : </label></td>
			<td><textarea id="Content_1" name="Content"  rows="10" cols="35"></textarea></td>
		</tr>
		<strong><a style="cursor: pointer;" id="add-toggle">+ Add Toggle</a></strong>
		<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
	</table>

</div>
</form>

<!-- Video shortcodes
============================================================================================================ -->

<?php } elseif( $action == 'video' ){ ?>

	<script type="text/javascript">
		function init() {
    tinyMCEPopup.resizeToInnerSize();
}
		function createpostShortcode() {
			var VideoUrl=jQuery("#VideoUrl").val();var width=jQuery("#width").val();var height=jQuery("#height").val();var output="[video ";if(width){output+='width="'+width+'" '}if(height){output+='height="'+height+'" '}output+="]"+VideoUrl+"[/video]";tinyMCEPopup.execCommand("mceReplaceContent",false,output);tinyMCEPopup.close()
			return;
		}
		
	</script>
	<title>Add Video</title>

</head>
<body>
<form id="postShortcode">
	<table>
		<tr>
		<td><label for="VideoUrl" style="width:230px">Youtube / Vimeo / Dailymotion Video Url : </label></td>
		<td><input id="VideoUrl" name="VideoUrl" type="text" value="http://" class="size"/><td>

	</tr>
	<tr>
		<td><label for="width">Width :</label></td>
		<td><input style="width:40px;" id="width" name="width" type="text" value="" /></td>
	</tr>
	<tr>
		<td><label for="height">Height :</label></td>
		<td><input style="width:40px;"  id="height" name="height" type="text" value="" /></td>
	</tr>

	
	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</table>
</form>

<!-- Tooltip shortcodes
============================================================================================================ -->

<?php } elseif( $action == 'tooltip' ){ ?>

	<script type="text/javascript">
		function init() {
    tinyMCEPopup.resizeToInnerSize();
}
		function createpostShortcode() {

				var Text = jQuery('#Text').val();
				var gravity = jQuery('#Gravities').val();
				var Content = jQuery('#Content').val();


				var output = '[tooltip ';
				
				if(Text) {
					output += 'text="'+Text+'"';
				}
				if(gravity) {
					output += ' gravity="'+gravity+'"';
				}

				output += ']'+Content+'[/tooltip]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			return;
		}
		
	</script>
	<title>Add Tooltip</title>

</head>
<body>
<form id="postShortcode">
	<table>
		<tr>
		<td><label for="Text">Text</label></td>
		<input id="Text" name="Text" type="Text" value="" class="size" />
	</tr>

	<tr>
		<td><label for="Content">Content : </label></td>
		<textarea id="Content" name="Content" rows="10" cols="35"></textarea>
	</tr>
	
	
	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</table>
</form>

<!-- Social media shortcodes
============================================================================================================ -->

<?php } elseif( $action == 'share' ){ ?>
	<script type="text/javascript">
		function init() {
    tinyMCEPopup.resizeToInnerSize();
}
		function createpostShortcode() {
				var output = '';

				
				var tweet = jQuery('#tweet');
				if(tweet.is(":checked")) {
					output += '[tweet]';
				}
			
				
				var Google = jQuery('#Google');
				if(Google.is(":checked")) {
					output += '[google]';
				}
				
				var facebook = jQuery('#facebook');
				if(facebook.is(":checked")) {
					output += '[facebook]';
				}
				
				var linkedin = jQuery('#linkedin');
				if(linkedin.is(":checked")) {
					output += '[linkedin]';
				}
				
				var stumble = jQuery('#stumble');
				if(stumble.is(":checked")) {
					output += '[stumbleupon]';
				}
				var pinterest = jQuery('#pinterest');
				if(pinterest.is(":checked")) {
					output += '[pinterest]';
				}
						
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			return;
		}
	
	</script>
	<title>Add Share Buttons</title>

</head>
<body>
<form id="postShortcode">
	<table>
	
	<tr>
		<td><label for="tweet"><strong>Tweet Button</strong></label></td>
		<td><input id="tweet" name="tweet" type="checkbox" value="true" class="size" /></td>
	</tr>
	<tr>
		<td><label for="Google"><strong>Google+ Button</strong></label>
		<td><input id="Google" name="Google" type="checkbox" value="true" class="size" /></td>
	</tr>	
	<tr>
		<td><label for="facebook"><strong>Facebook Button</strong></label></td>
		<td><input id="facebook" name="facebook" type="checkbox" value="true" class="size" /></td>
	</tr>
	<tr>
		<td><label for="linkedin"><strong>Linkedin Button</strong></label></td>
		<td><input id="linkedin" name="linkedin" type="checkbox" value="true" class="size"/></td>
	</tr>
	<tr>
		<td><label for="stumble"><strong>Stumble Button</strong></label></td>
		<td><input id="stumble" name="stumble" type="checkbox" value="true" class="size" /></td>
	</tr>
	<tr>
		<td><label for="pinterest"><strong>Pinterest Button</strong></label></td>
		<td><input id="pinterest" name="pinterest" type="checkbox" value="true" class="size"/></td>
	</tr>
	<p class="insert"><input type="submit" id="insert" name="insert" value="Insert" onClick="createpostShortcode();" /></p>
</table>
</form>

<?php } ?>

</body>
</html>