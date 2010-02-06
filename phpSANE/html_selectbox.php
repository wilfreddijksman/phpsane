<?PHP
/**
 * generates html select dropdown list with options
 * if values is two dimensional then adds optgroup too
 * 
 * @param 	string	$name			selectbox name and id
 * @param 	array		$values		options
 * @param 	mixed		$selected	selected option
 * @param 	array		$attributes additonal attributes
 *
 * @return 	string	html source with selectbox
 */
function html_selectbox($name, $values, $selected=NULL, $attributes=array())
{
	$attr_html = '';
	if(is_array($attributes) && !empty($attributes))
	{
		foreach ($attributes as $k=>$v)
		{
			$attr_html .= ' '.$k.'="'.$v.'"';
		}
	}

	$output = '<select name="'.$name.'" id="'.$name.'"'.$attr_html.'>'."\n";
	if(is_array($values) && !empty($values))
	{
		foreach($values as $key=>$value)
		{
			if(is_array($value))
			{
				$output .= '<optgroup label="'.$key.'">'."\n";
				foreach($value as $k=>$v)
				{
					$sel = $selected==$k ? ' selected="selected"' : '';
					$output .= '<option value="'.$k.'"'.$sel.'>'.$v.'</option>'."\n";
				}
				$output .= '</optgroup>'."\n";
			}
			else
			{
				$sel = $selected==$key ? ' selected="selected"' : '';
				$output .= '<option value="'.$value.'"'.$sel.'>'.$value.'</option>'."\n";
			}
		}
	}
	$output .= "</select>\n";

	return $output;
}

?>