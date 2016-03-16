$("#registrationForm").validate({
rules:{
name:{
required:true,
maxlength:50,
minlength:1
},
age:{
required:true,
max:30,
min:15,
digits: true
},
phone:{
required:true,
maxlength:15,
minlength:10,
digits: true
},
email:{
required:true,
maxlength:50,
minlength:11
},
college:{
required:true,
minlength:2
},
address:{
required:true,
minlength:2
},
gender:{
required:true,
}

}
});



