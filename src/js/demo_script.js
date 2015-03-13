
/*
$( document ).ready(function() {
  //use this to load in sample css and html
  loadWith("test.css", "test.html", run);
});
*/
// loads a css and html file into the boxes
function loadWith(cssfile, htmlfile) {
  $( "#cssbox" ).load(cssfile);
  $( "#htmlbox" ).load(htmlfile);
}
function saveTextAsFile()
{
        var textToWrite = $('#output').contents().find('html').html();
        var textToWrite = "<!DOCTYPE html><html lang='en'>" + textToWrite;
        var textToWrite = textToWrite + "</html>";
	var textFileAsBlob = new Blob([textToWrite], {type:'text/html'});
	var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;

	var downloadLink = document.createElement("a");
	downloadLink.download = fileNameToSaveAs;
	downloadLink.innerHTML = "Download File";
	if (window.webkitURL != null)
	{
		// Chrome allows the link to be clicked
		// without actually adding it to the DOM.
		downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
	}
	else
	{
		// Firefox requires the link to be added to the DOM
		// before it can be clicked.
		downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
		downloadLink.onclick = destroyClickedElement;
		downloadLink.style.display = "none";
		document.body.appendChild(downloadLink);
	}

	downloadLink.click();
}

// outputs resulting page to output
function run() {
  
  var result;
  result = "<!DOCTYPE html><html lang='en'><head><style type='text/css'>\n";
  result += cssbox.value;
  result += "\n</style></head><body>";
  result += htmlbox.value;
  result += "</body></html>";
  
  if(output.contentDocument) doc = output.contentDocument;
  else if(output.contentWindow) doc = output.contentWindow.document;
  else doc = output.document;
 
  doc.open();
  doc.writeln(result);
  doc.close();
}