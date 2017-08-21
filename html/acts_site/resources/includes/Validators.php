<?php

    function UserDataValidator($request)
    {
       $Rules = array();
        if ($request['password'] != null) 
            $Rules['password'] = 'required|string|min:6|confirmed'; 

        if ($request['username'] != null) 
            $Rules['username'] = 'required|string|max:255|unique:users'; 
        
        if ($request['email'] != null)
            $Rules['email'] = 'required|string|email|max:255|unique:users';
        
        if ($request['isadmin'] != null)
        	$Rules['isadmin'] = 'required|boolean';
        
        if ($request['hasmasters'] != null)
        	$Rules['hasmasters'] = 'required|boolean'; 
        
        if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    } 

    function TeacherDataValidator($request)
    {
        $Rules = array();
        
        if ($request['firstname'] != null) 
            $Rules['firstname'] = 'required|string|min:6';    
        
        if ($request['middlename'] != null) 
            $Rules['middlename'] = 'required|string|min:6'; 
        
        if ($request['lastname'] != null)
            $Rules['lastname'] = 'required|string|min:6';
        
        if ($request['department'] != null)
        	$Rules['department'] = 'required|string|min:4';
        
        if ($request['profession'] != null)
        	$Rules['profession'] = 'required|string|min:6';
     
        if ($request['photo'] != null)
        	$Rules['photo'] = 'mimes:jpeg,png,bmp,gif';
     
        if ($request['datetime'] != null)
        	$Rules['datetime'] = 'required|min:4';
        
        if ($request['room'] != null)
        	$Rules['room'] = 'required|string';
        
        if ($request['phone'] != null)
        	$Rules['phone'] = 'required|min:10';
        
        if ($request['mobile'] != null)
        	$Rules['mobile'] = 'required|min:10';
        
        if ($request['profint'] != null)
        	$Rules['profint'] = 'required|min:6';
        
        if ($request['disciplines'] != null)
        	$Rules['disciplines'] = 'required|min:6';
       
        if ($request['position'] != null)
        	$Rules['position'] = 'required|min:6';
     
        if ($request['isteacher'] != null)
        	$Rules['isteacher'] = 'required|boolean';
        if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    } 


    function LinksValidator($links_array, $request){
    	$Rules = array();
    	foreach ($links_array as $key) {
    		if ($request[$key] != null)
    		 $Rules[$key] = 'required|url|min:2';
    	}
    	if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           if ($Validator->fails())
            return redirect()->back()->withErrors($Validator->errors());
         }
    }

    function UserLinksValidator($links_array, $request)
    {
        $Rules = array();
        foreach ($links_array as $key) {
            if ($request[$key] != null)
             $Rules[$key] = 'required|url|min:2';
        }
        if (count($Rules) > 0)
         {   
           $Validator = \Validator::make($request->all(), $Rules);
           return $Validator;
         }
    }

?>