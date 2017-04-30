<?php
/*
Plugin Name: To-Dos
Plugin URI: http://www.swedishboy.dk/wordpress/to-dos/
Description: Add to-dos to the Dashboard. With checkboxes for marking when a task is done. Support for the following HTML tags: &lt;b&gt;&lt;i&gt;&lt;u&gt;&lt;a&gt;&lt;br&gt;&lt;font&gt;
Version: 1.0
Author: Johan Str&ouml;m
Author URI: http://www.swedishboy.dk/
*/

// pretty obvious...
function todos_output() {
	// first of all we check that the user got admin status.
	global $current_user;
	
	if($current_user->user_level==10) { 
	
		// then we fetch our settings
		$options = get_option('todos_saved');	
	
	
		// here we save any posted new notes
		if($_POST['todo_action']) {
			if(isset($options['todos'])) {
				foreach($options['todos'] as $i => $t) {
				 if(isset($_POST['t-'.$i])) $options['todos'][$i][1]=1;
				 else $options['todos'][$i][1]=0;
				}
			}
			if($_POST['new']!="") {
				$style='<span style="color: '.$_POST['col'].';'.($_POST['b']?'font-weight: bold; ':'').($_POST['u']?'text-decoration: underline':'').'">';
				$options['todos'][] = array($style.strip_tags($_POST['new'],$options['allow_tags']).'</span>',0);
			}
			update_option('todos_saved', $options);			
		}

// we end wordpress main dashboard widget with a simple hack
?>
<script language="javascript">
function todo_update() {
	document.dashboard_todos.submit();
}
</script>
<form name="dashboard_todos" method="post">
<input type="hidden" name="todo_action" value="1">
<?php
	if(isset($options['todos'])) {
		foreach($options['todos'] as $key => $todo) { 
		echo '<div style="border-bottom: 1px dotted #ccc; padding: 5px 0px;"><span style="float: left;"><input type="checkbox" value="1" onclick="todo_update()" name="t-'.$key.'"';
		if($todo[1]==1) echo ' checked';
		echo '></span> <div style="margin-left: 24px; line-height: 1.2em;">';
		echo stripslashes($todo[0])."</div></div>";
		}
	}
?>
		<br />
		<span style="padding: 3px;">Add new</span>
		<input type="text" name="new" size="30" style="width: 70%; margin-right: 10px;" tabindex="2"><input type="submit" name="save-todo" id="todos_submit" accesskey="t" tabindex="2" class="button" value="Add" /><br />
		<div style="margin-left: 70px; margin-top:4px;"><small>Color: <select name="col">
		<option>black</option>
		<option>red</option>
		<option>green</option>
		<option>grey</option>
		<option>orange</option>
		<option>blue</option>
		</select>
		<input type="checkbox" name="b" value="1"> Bold - <input type="checkbox" name="u" value="1"> Underline</small>

<div align="right" style="float: right; margin-top: 10px; font-size: 9px;"><a href="?edit=dashboard_todos#dashboard_todos">Clean Up</a></div>		
		</div>
		</form>

<?php
	}
}

// dashboard widget configure
function todos_setup() {
			$options = get_option('todos_saved');	
	if(isset($_POST['widget_id']) && $_POST['widget_id']=='dashboard_todos') {
		if(isset($_POST['cleanup'])) {			
				foreach($options['todos'] as $i => $t) {
					 if($options['todos'][$i][1]==1) unset($options['todos'][$i]);		
				}
		}
		$options['allow_tags']=$_POST['allow_tags'];
		update_option('todos_saved', $options);	
	}

	$tags = htmlspecialchars($options['allow_tags'], ENT_QUOTES);
?>
Allow HTML tags <input type="text" name="allow_tags" size="35" style="background: #ccc; color: #000; font-family: monospace; font-size: 11px;" value="<?=$tags;?>"><br /><br />
Remove to-dos that are checked <input type="checkbox" name="cleanup" value="1"> 
<?php
}

// add our plugin to the dashboard!
function add_todos_widget() {
wp_add_dashboard_widget('dashboard_todos', __('To-Dos'), 'todos_output','todos_setup');	
} 

function todos_init() {
	$options = get_option('todos_saved');
	if(!isset($options['allow_tags'])) {
		$options['allow_tags']='<b><i><a><u><br><font>';
		update_option('todos_saved', $options);			
	}
}
add_action('init', 'todos_init');
add_action('wp_dashboard_setup','add_todos_widget');
?>