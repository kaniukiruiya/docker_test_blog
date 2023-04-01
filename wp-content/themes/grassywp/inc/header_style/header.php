<?php
/*
Grassy inlcude header
*/
if(is_page()){
	 //check individual header 
    $post_meta_header = get_post_meta($post->ID, 'trans_header', true);	 
	 if($post_meta_header!=''){
		 	
			 if($post_meta_header == 'Header Style 2'){		 
				require get_parent_theme_file_path('inc/header_style/header-style2.php');				
			 }
			  if($post_meta_header == 'Header Style 3'){		 
				require get_parent_theme_file_path('inc/header_style/header-style3.php');		
			 }
			  if($post_meta_header == 'Header Style 4'){		 
				require get_parent_theme_file_path('inc/header_style/header-style4.php');		
			 }	 
			 if($post_meta_header == 'Header Style 1'){		
				require get_parent_theme_file_path('inc/header_style/header-style1.php');       
			 }
			 if($post_meta_header == 'Header Style 5'){		
				require get_parent_theme_file_path('inc/header_style/header-style5.php');       
			 }
	 	}
	else if(!empty($grassywp_option['header_layout'])){		 
			 $header_style = $grassywp_option['header_layout'];	 			 
			 if($header_style == 'style2'){		 
				 require get_parent_theme_file_path('inc/header_style/header-style2.php');		
			 }
			  if($header_style == 'style3'){		 
				 require get_parent_theme_file_path('inc/header_style/header-style3.php');		
			 }
			  if($header_style == 'style4'){		 
				 require get_parent_theme_file_path('inc/header_style/header-style4.php');		
			 }	 
			 if($header_style == 'style1'){		
				require get_parent_theme_file_path('inc/header_style/header-style1.php');       
			 }
			 if($header_style == 'style5'){		
				require get_parent_theme_file_path('inc/header_style/header-style5.php');       
			 }		  
		}
		
	else{
		require get_parent_theme_file_path('inc/header_style/header-style1.php'); 
	}
		
}
	 elseif(!empty($grassywp_option['header_layout']))
		 {	//checking header style form global settings
			 $header_style = $grassywp_option['header_layout'];	 
			 if($header_style == 'style1'){		
				require get_parent_theme_file_path('inc/header_style/header-style1.php');       
			 }
			 if($header_style == 'style2'){		 
				require get_parent_theme_file_path('inc/header_style/header-style2.php');		
			 }
			  if($header_style == 'style3'){		 
				require get_parent_theme_file_path('inc/header_style/header-style3.php');		
			 }
			  if($header_style == 'style4'){		 
				require get_parent_theme_file_path('inc/header_style/header-style4.php');		
			 }	
			 if($header_style == 'style5'){		
				require get_parent_theme_file_path('inc/header_style/header-style5.php');       
			 } 
			 
}
else{
	require get_parent_theme_file_path('inc/header_style/header-style1.php');
}
	 
?>
