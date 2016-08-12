<?php

function notunHarfKarsiligi($fonksiyonIcindekiNot){
	if($fonksiyonIcindekiNot>=85) return "A";
	if($fonksiyonIcindekiNot>=70) return "B";
	if($fonksiyonIcindekiNot>=55) return "C";
	if($fonksiyonIcindekiNot>=45) return "D";
	return "E";
}