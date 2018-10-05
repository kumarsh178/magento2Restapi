define(['jquery'],function(){
	"use strict";
	var module = {
		 	heloo:function (){
		 	console.log('heloo first require js');
		 },
		 add:function(a,b){
		 		console.log(a+b);
		 }
		};
		return module;
});