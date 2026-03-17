var arrCapFieldId = [];
var bCapCaseSensitive = true;
function scapchk(jfldcls,capfieldid,bDocWrite) {
	if (jfldcls == null)
		jfldcls = "input-medium";
	if (bDocWrite == null)
		bDocWrite = true;
	arrCapFieldId[ capfieldid ] = (Math.floor(Math.random()*50))+1;
	cword =
	["19de8b228cde95e02a19e56656046274", "b60deadd9ff285fbcab9edfcd4301898", "eb84bfcbf56f08223d5d6da0bb33295a", 
	 "0baac446408adaa39c55486e954e7906", "9be6a43ca0980a574ff5ae054e0a6c1c", "522dbba43311c57a67ed86b635885169", 
	 "fa04ab234eb43d9163314a0b7956a874", "9604b0c623cb068fc1cdcf4b5be7400d", "d74419cad108b025a4031831893e9f07", 
	 "b44fbeaa1a13e1348c9dbd0fdcbbeed6", "d9f7821627c1c29cbee8b4999e7f0f00", "c68e56f2e58bb2651c23cd598d54fc2c", 
	 "4d02cfb0ea428e254208c52f1ff34ba4", "51d8b32ecd1e74a6357917c4d1f10830", "e26b8d3ee0776c26c98c920e11ff5374", 
	 "0a72171c82c954e015a78ddfbfe27bde", "440142494a07ee8ebc5ad386c08960c4", "7b85a8b63156415ea57439105e77ee95", 
	 "5f9b7873b48a30e4043e4af409760bf1", "c99ec9dc76991f4c7fd6b109fc3f7975", "3be14c3f29a3f0abd6e0b7e94626e66f", 
	 "79a82acc27221e99dc4c2dc76b4ab796", "591edef7a767282ca6de44ff7742221f", "98a969d5cfc1ba15557e15b6aa03db15", 
	 "9641fc5aad47eba9b670a4b7f10a91a2", "01447fd855913b71b692d335a910b0aa", "1716892bb8e12ee9d104c46bbbb91012", 
	 "580beceaed36dea335ce5c7e3cf8eb1f", "40ea84c1c72cb49f62cf73dce4885af2", "58c5a2c9e525b20ccc09b08c10128b70", 
	 "623e3f870d513e75f936316f0614524e", "cd7091382756e17f015c61c69b59b2de", "9cef8363dde271d34d1bdee8d779558b", 
	 "fd24206d49337fe09a2492735720a5a8", "b1d8d2c7f699638b78f9c2e027c56dcd", "c9dec2e7005e14ed4089f7465eff204f", 
	 "5ba36883a4e365dddbf708c50c061af0", "1ef2951ce7dc19e15857c978dd02400a", "e59396b2ed693175d7c3f28041ebdf03", 
	 "4b307f8443f6f0595d331f50fcba0724", "bf26bd6676fae49b82acb7dec10490a6", "1267166a3d19f62f11363dbbae073c53", 
	 "f646e75469a2817a97d0ca598bae7503", "bb768fa92d8b3eb5e8aafb6c23f8d14c", "e0729cf0c60e1dc8539f6ead65c754e1", 
	 "715434ae776c39a13e5a631676481231", "7f46b6b79c1281d6643db833cc178bcc", "39ed630024998bee78028e0da4c068b0", 
	 "aeeaada6204e1e768391543759934ce1", "959770baf81926a1a6014bd209aeb65f"];
	outHTML = "<input type=\"text\" id=\"" + capfieldid + "\" name=\"" + capfieldid + "\" class=\"" + jfldcls + " input-medium\"><br>" +
	          "<img style=\"margin-top:4px\" src=\"" + encodeURI("_scripts/captcha/pic768dir/") + parseInt( arrCapFieldId[ capfieldid ] ) + ".jpg\" width=\"160\" height=\"40\" alt=\"\">";
	if (bDocWrite)
		document.write( outHTML );
	else
		return outHTML;
}
function capchk(capfieldid, bShowAlert) {
	if (bShowAlert == null)
		bShowAlert = true;
  var capfieldval = document.getElementById(capfieldid).value;		
	if( !bCapCaseSensitive )
	  capfieldval = capfieldval.toLowerCase();
	if (hex_md5(capfieldval)==cword[arrCapFieldId[ capfieldid ]-1])
		return true;
	else {
		if (bShowAlert) {
			alert("Vous avez mal saisi le code de vérification, merci de le saisir tel qu\'il est affiché sur l\'image");
			document.getElementById(capfieldid).focus();
		}
		return false;
	}
}
