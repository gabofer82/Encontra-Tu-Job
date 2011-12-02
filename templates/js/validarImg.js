function validar_img() {
	var filename = document.getElementById('fileFoto').value;
	var ext = filename.toUpperCase().substr(-3);

	if(ext != "") {
		if(ext != 'PNG' && ext != 'JPG' && ext != 'JPEG') {
			alert("Formato de imagen no valido.");
			return false;
		}

		var pic = new Image();
		pic.src = filename;
		if(pic.width > 400 || pic.height > 400) {
			alert("Tama�o de imagen no valido.");
			return false;
		}

		var fs = new ActiveXObject("Scripting. FileSystemObject");
		var f = fs.GetFile(filename);
		alert(f.Name + " usa " + f.size + " bytes.");

		return true;
	}
}