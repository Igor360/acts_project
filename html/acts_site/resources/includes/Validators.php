<?php

    function UserDataValidator($password, $username, $email, $isadmin = null, $hasmasters = null)
    {
       $Rules = array();
        if ($password != null) 
            $Rules['password'] = 'required|string|min:6|confirmed';    
        if ($username != null) 
            $Rules['username'] = 'required|string|max:255|unique:users'; 
        if ($email != null)
            $Rules['email'] = 'required|string|email|max:255|unique:users';
        if ($isadmin != null)
        	$Rules['isadmin'] = 'required|boolean';
        if ($hasmasters != null)
        	$Rules['hasmasters'] = 'required|boolean'; 
        if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    } 

    function TeacherDataValidator($firstname, $middlename, $lastname, $department, $profession, $photo, $timedate, $room, $phone, $mobile, $profinterests, $disciplines, $position, $is_teacher)
    {
         $Rules = array();
        if ($firstname != null) 
            $Rules['firstname'] = 'required|string|min:6';    
        if ($middlename != null) 
            $Rules['middlename'] = 'required|string|min:6'; 
        if ($lastname != null)
            $Rules['lastname'] = 'required|string|min:6';
        if ($department != null)
        	$Rules['department'] = 'required|string|min:4';
        if ($profession != null)
        	$Rules['profession'] = 'required|string|min:6';
        if ($photo != null)
        	$Rules['photo'] = 'mimes:jpeg,png,bmp,gif';
        if ($timedate != null)
        	$Rules['datetime'] = 'required|min:4';
        if ($room != null)
        	$Rules['room'] = 'required|string';
        if ($phone != null)
        	$Rules['phone'] = 'required|min:10';
        if ($mobile != null)
        	$Rules['mobile'] = 'required|min:10';
        if ($profinterests != null)
        	$Rules['profint'] = 'required|min:6';
        if ($disciplines != null)
        	$Rules['disciplines'] = 'required|min:6';
        if ($position != null)
        	$Rules['position'] = 'required|min:6';
        if ($is_teacher != null)
        	$Rules['isteacher'] = 'required|boolean';
        if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    } 


    function LinksValidator(Array $links_array){
    	$Rules = array();
    	foreach ($links_array as $key => $value) {
    		if ($value != null)
    		 $Rules[$key] = 'requred|url|min:2';
    	}
    	if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    }

?>