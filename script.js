function validations(){
    var firstname=document.profile.firstname.value; 
    var num=document.profile.mobilenumber.value;
    pattern=/^[a-zA-Z]*$/;
    var email=document.profile.username.value;  
    
  
  if(firstname.match(pattern))
    {  
        return true;
     }else{    
        
        document.getElementById("letter").innerHTML=" name allows alphabets only";
       return false;  
    }
//      if (isNaN(num)){  
//         document.getElementById("numloc").innerHTML="Enter Numeric value only";  
//         return false;  
//               }else{  
//         return true;  
//         }
        if(email.indexOf('@')<=0){
            alert("@ invalid position");
            return false;
          }
          if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
            alert(". invalid");
            return false;
          }
    
}
